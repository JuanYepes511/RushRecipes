document.addEventListener('DOMContentLoaded', () => {
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
    const logoutBtn = document.getElementById('logoutBtn');
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const submitLogin = document.getElementById('submitLogin');
    const submitRegister = document.getElementById('submitRegister');
    const userWelcome = document.getElementById('userWelcome');
    const usernameSpan = document.getElementById('username');

    loginBtn.addEventListener('click', () => loginModal.style.display = 'block');
    registerBtn.addEventListener('click', () => registerModal.style.display = 'block');

    window.addEventListener('click', (event) => {
        if (event.target === loginModal) loginModal.style.display = 'none';
        if (event.target === registerModal) registerModal.style.display = 'none';
    });

    submitLogin.addEventListener('click', () => {
        const username = document.getElementById('loginUsername').value;
        const password = document.getElementById('loginPassword').value;
        // Here you would typically send a request to your server to verify the credentials
        // For this example, we'll just simulate a successful login
        loginUser(username);
    });

    submitRegister.addEventListener('click', () => {
        const username = document.getElementById('registerUsername').value;
        const password = document.getElementById('registerPassword').value;
        // Here you would typically send a request to your server to register the new user
        // For this example, we'll just simulate a successful registration
        registerUser(username);
    });

    logoutBtn.addEventListener('click', logoutUser);

    function loginUser(username) {
        localStorage.setItem('user', username);
        updateAuthUI(true);
        loginModal.style.display = 'none';
    }

    function registerUser(username) {
        localStorage.setItem('user', username);
        updateAuthUI(true);
        registerModal.style.display = 'none';
    }

    function logoutUser() {
        localStorage.removeItem('user');
        updateAuthUI(false);
    }

    function updateAuthUI(isLoggedIn) {
        if (isLoggedIn) {
            const username = localStorage.getItem('user');
            loginBtn.style.display = 'none';
            registerBtn.style.display = 'none';
            userWelcome.style.display = 'inline';
            logoutBtn.style.display = 'inline';
            usernameSpan.textContent = username;
        } else {
            loginBtn.style.display = 'inline';
            registerBtn.style.display = 'inline';
            userWelcome.style.display = 'none';
            logoutBtn.style.display = 'none';
        }
    }

    // Check if user is already logged in on page load
    updateAuthUI(localStorage.getItem('user') !== null);
});
''