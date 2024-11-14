const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');
const path = require('path');

const app = express();
const port = 3000;

app.use(express.json());
app.use(express.static(path.join(__dirname, 'public')));

// Conectar a la base de datos SQLite
const db = new sqlite3.Database('./users.db', (err) => {
    if (err) {
        console.error(err.message);
    }
    console.log('Conectado a la base de datos SQLite.');
});

// Actualizar la creación de la tabla de usuarios
db.run(`CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    email TEXT UNIQUE,
    password TEXT
)`);

// Ruta para el login
app.post('/api/login', (req, res) => {
    const { email, password } = req.body;

    db.get('SELECT * FROM users WHERE email = ?', [email], (err, user) => {
        if (err) {
            return res.status(500).json({ message: 'Error del servidor' });
        }

        if (!user) {
            return res.status(400).json({ message: 'Usuario no encontrado' });
        }

        bcrypt.compare(password, user.password, (err, result) => {
            if (err) {
                return res.status(500).json({ message: 'Error del servidor' });
            }

            if (result) {
                const token = jwt.sign({ userId: user.id }, 'tu_secreto_jwt', { expiresIn: '1h' });
                return res.json({ message: 'Login exitoso', token });
            } else {
                return res.status(400).json({ message: 'Contraseña incorrecta' });
            }
        });
    });
});

// Ruta para registrar un nuevo usuario
app.post('/api/register', async (req, res) => {
    const { name, email, password } = req.body;

    // Validar que todos los campos estén presentes
    if (!name || !email || !password) {
        return res.status(400).json({ message: 'Todos los campos son obligatorios' });
    }

    // Hashear la contraseña
    const hashedPassword = await bcrypt.hash(password, 10);

    // Insertar el nuevo usuario en la base de datos
    db.run('INSERT INTO users (name, email, password) VALUES (?, ?, ?)', [name, email, hashedPassword], function(err) {
        if (err) {
            return res.status(500).json({ message: 'Error al registrar el usuario' });
        }
        res.status(201).json({ message: 'Usuario registrado exitosamente' });
    });
});

// Ruta para validar ingredientes
app.get('/api/validate-ingredient', (req, res) => {
    const { name } = req.query;

    db.get('SELECT * FROM ingredients WHERE name = ?', [name], (err, ingredient) => {
        if (err) {
            return res.status(500).json({ message: 'Error del servidor' });
        }

        res.json({ exists: ingredient !== undefined });
    });
});

// Ruta para buscar recetas
app.get('/api/search-recipes', (req, res) => {
    const { ingredients } = req.query; // Se espera que los ingredientes se pasen como una cadena separada por comas
    const ingredientList = ingredients.split(',').map(ingredient => ingredient.trim());

    const placeholders = ingredientList.map(() => '?').join(',');
    const sql = `SELECT * FROM recipes WHERE ingredients LIKE '%' || ? || '%'`;

    const promises = ingredientList.map(ingredient => {
        return new Promise((resolve, reject) => {
            db.all(sql, [ingredient], (err, rows) => {
                if (err) {
                    return reject(err);
                }
                resolve(rows);
            });
        });
    });

    Promise.all(promises)
        .then(results => {
            const uniqueRecipes = [...new Set(results.flat().map(recipe => recipe.id))];
            res.json(uniqueRecipes);
        })
        .catch(err => {
            res.status(500).json({ message: 'Error del servidor' });
        });
});

// Ruta para obtener detalles de una receta
app.get('/api/recipe/:id', (req, res) => {
    const { id } = req.params;

    db.get('SELECT * FROM recipes WHERE id = ?', [id], (err, recipe) => {
        if (err) {
            return res.status(500).json({ message: 'Error del servidor' });
        }

        res.json(recipe);
    });
});

app.listen(port, () => {
    console.log(`Servidor corriendo en http://localhost:${port}`);
});
