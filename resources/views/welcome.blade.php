<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RushRecipes</title>
    <link rel="stylesheet" href="{{ asset('../resources/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('../resources/css/welcome.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body>
    @include("components.navbar")

    @include("components.homepage")
    @extends("components.footer")



    <script src="{{ asset('../resources/js/auth.js') }}"></script>
    <script src="js/recipe-search.js"></script>
</body>
</html>
