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
                
                <!-- Mostrar los datos del usuario logueado -->
                <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                
                <!-- Mostrar el plan actual (suponiendo que tienes un campo 'plan' en el modelo User) -->
                <p><strong>Plan Actual:</strong> 
                    @if(Auth::user()->plan)
                        {{ Auth::user()->plan }}
                    @else
                        No tienes un plan asignado.
                    @endif
                </p>

                <!-- Botón para mejorar el plan -->
                <button id="upgrade-plan-btn" onclick="window.location.href='{{ url('/payment') }}'">Mejorar Plan</button>
            </section>
        </main>
    </div>

    @include("components.footer")
</body>
</html>
