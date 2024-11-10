<link rel="stylesheet" href="{{ asset('../resources/css/home.css') }}">
<div class="container">
        <aside class="ad-space left">
            <p>Espacio para publicidad</p>
        </aside>

        <main class="main-content">

            <section id="hero">
                <h1>Encuentra la Receta Perfecta con tus Ingredientes</h1>
                <p>Ingresa los ingredientes que tienes y encontraremos deliciosas recetas para ti!</p>
            </section>

            @include("components.filter")


            <section id="about-us">
                <h2>Sobre Nosotros</h2>
                <p>Nos apasiona ayudarte a crear deliciosas comidas con los ingredientes que ya tienes. Nuestro buscador inteligente de recetas elimina el estrés de la planificación de comidas y reduce el desperdicio de alimentos.</p>
            </section>
            @include("components.contact")



        </main>

        <aside class="ad-space right">
            <p>Espacio para publicidad</p>
        </aside>
    </div>
