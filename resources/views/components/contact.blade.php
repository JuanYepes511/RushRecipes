<link rel="stylesheet" href="{{ asset('../resources/css/contact.css') }}">
<section id="contact-us">
    <h2>Contáctanos</h2>
    <form id="contact-form">
        <input type="text" placeholder="Tu Nombre" required>
        <input type="email" placeholder="Tu Email" required>
        <textarea placeholder="Tu Mensaje" required></textarea>
        <button type="submit">Enviar Mensaje</button>
    </form>
    
    <!-- Mensaje de confirmación tras el "envío" -->
    <div id="form-message" style="display:none; color: green; margin-top: 20px;">
        ¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const messageDiv = document.getElementById('form-message');
    
    form.addEventListener('submit', function(event) {
        event.preventDefault();  // Evita que se recargue la página
        
        // Simula el "envío" del formulario (puedes procesar los datos aquí si quieres)
        const formData = new FormData(form);
        
        // Aquí puedes agregar lógica para enviar los datos a un servidor, si lo deseas, utilizando Fetch o AJAX.
        
        // Muestra el mensaje de confirmación
        form.reset(); // Limpia el formulario después de enviarlo
        messageDiv.style.display = 'block';
        
        // Opcional: Oculta el mensaje después de 5 segundos
        setTimeout(function() {
            messageDiv.style.display = 'none';
        }, 5000);
    });
});
</script>
