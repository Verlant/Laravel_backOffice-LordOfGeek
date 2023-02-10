<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titre')</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav>
        <a href="{{ route('jeux.index') }}">Jeux</a>
        <a href="{{ route('jeux.show',1) }}">Jeu n°1</a>
        <a href="{{ route('jeux.create') }}">Create</a>
    </nav>

    <div class="container">
        @yield('contenu')
    </div>
</body>

</html>