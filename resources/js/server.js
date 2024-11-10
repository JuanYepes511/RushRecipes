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

// Ruta para el registro
app.post('/api/register', (req, res) => {
    const { name, email, password } = req.body;

    bcrypt.hash(password, 10, (err, hash) => {
        if (err) {
            return res.status(500).json({ message: 'Error al encriptar la contraseña' });
        }

        db.run('INSERT INTO users (name, email, password) VALUES (?, ?, ?)', [name, email, hash], (err) => {
            if (err) {
                if (err.message.includes('UNIQUE constraint failed')) {
                    return res.status(400).json({ message: 'El correo electrónico ya está registrado' });
                }
                return res.status(500).json({ message: 'Error al registrar el usuario' });
            }

            res.json({ message: 'Usuario registrado exitosamente' });
        });
    });
});

app.listen(port, () => {
    console.log(`Servidor corriendo en http://localhost:${port}`);
});
