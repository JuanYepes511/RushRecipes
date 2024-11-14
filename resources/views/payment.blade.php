<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasarela de Pago</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/payment.css') }}">
</head>
<body>
    @include("components.navbar")

    <div class="container">
        <main class="main-content">
            <section id="payment-section">
                <h1>Mejora tu Plan</h1>
                <p>Accede a beneficios exclusivos, nuevas recetas y mejores filtros por solo $3.00.</p>
                <form id="payment-form">
                    <div class="form-group">
                        <label for="card-name">Nombre en la Tarjeta:</label>
                        <input type="text" id="card-name" required>
                    </div>
                    <div class="form-group">
                        <label for="card-number">Número de Tarjeta:</label>
                        <input type="text" id="card-number" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry-date">Fecha de Vencimiento (MM/AA):</label>
                        <input type="text" id="expiry-date" required>
                    </div>
                    <div class="form-group">
                        <label for="security-code">Código de Seguridad:</label>
                        <input type="text" id="security-code" required>
                    </div>
                    <button type="submit">Pagar</button>
                </form>
            </section>
        </main>
    </div>

    @include("components.footer")

    <script>
        document.getElementById('payment-form').addEventListener('submit', function(event) {
            event.preventDefault();
            // Validar tarjeta aquí
            const cardNumber = document.getElementById('card-number').value;
            const expiryDate = document.getElementById('expiry-date').value;
            const securityCode = document.getElementById('security-code').value;

            // Lógica de validación de tarjeta (simplificada)
            if (isValidCard(cardNumber, expiryDate, securityCode)) {
                alert('Pago realizado con éxito');
                // Redirigir o realizar acción adicional
            } else {
                alert('Por favor, verifica los datos de tu tarjeta.');
            }
        });

        function isValidCard(cardNumber, expiryDate, securityCode) {
            // Implementar lógica de validación de tarjeta aquí
            return true; // Cambiar según la validación real
        }
    </script>
</body>
</html>
