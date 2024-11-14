<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/profile.css') }}">
</head>
<body>
    @include("components.navbar")

    <div class="container">
        <main class="main-content">
            <section id="user-profile">
                <h1>Tu Perfil</h1>
                <p><strong>Nombre:</strong> </p>
                <p><strong>Email:</strong> </p>
                <p><strong>Plan Actual:</strong> </p>
                <button id="upgrade-plan-btn" onclick="window.location.href='{{ url('/payment') }}'">Mejorar Plan</button>
            </section>
        </main>
    </div>

    @include("components.footer")
</body>
</html>
