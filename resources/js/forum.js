document.addEventListener('DOMContentLoaded', () => {
    const postForm = document.getElementById('post-form');
    const loginMessage = document.getElementById('login-message');
    const postsContainer = document.getElementById('posts-container');
    const newPostForm = document.getElementById('new-post-form');

    // Función para verificar si el usuario ha iniciado sesión
    function checkLoginStatus() {
        // Aquí deberías implementar la lógica real para verificar el estado de inicio de sesión
        // Por ahora, usaremos localStorage como ejemplo
        const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
        const username = localStorage.getItem('username');

        if (isLoggedIn && username) {
            postForm.style.display = 'block';
            loginMessage.style.display = 'none';
        } else {
            postForm.style.display = 'none';
            loginMessage.style.display = 'block';
        }

        return { isLoggedIn, username };
    }

    // Función para cargar las publicaciones
    function loadPosts() {
        // Aquí deberías hacer una llamada a tu API para obtener las publicaciones
        // Por ahora, usaremos datos de ejemplo
        const posts = [
            { id: 1, title: 'Receta de Paella', author: 'usuario1', content: 'Aquí está mi receta favorita de paella...', date: '2023-05-01' },
            { id: 2, title: 'Tip para hacer pasta', author: 'usuario2', content: 'Un truco para hacer la mejor pasta...', date: '2023-05-02' },
        ];

        postsContainer.innerHTML = '';
        posts.forEach(post => {
            const postElement = document.createElement('div');
            postElement.classList.add('post');
            postElement.innerHTML = `
                <h3>${post.title}</h3>
                <p class="author">Publicado por ${post.author} el ${post.date}</p>
                <p class="content">${post.content}</p>
                <div class="actions">
                    <a href="#" class="reply">Responder</a>
                    <a href="#" class="like">Me gusta</a>
                </div>
            `;
            postsContainer.appendChild(postElement);
        });
    }

    // Manejar el envío de nuevas publicaciones
    newPostForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const { isLoggedIn, username } = checkLoginStatus();
        if (!isLoggedIn) return;

        const title = document.getElementById('post-title').value;
        const content = document.getElementById('post-content').value;

        // Aquí deberías hacer una llamada a tu API para guardar la nueva publicación
        console.log('Nueva publicación:', { title, content, author: username });

        // Limpiar el formulario y recargar las publicaciones
        newPostForm.reset();
        loadPosts();
    });

    // Inicializar
    checkLoginStatus();
    loadPosts();
});
