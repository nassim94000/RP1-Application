<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Synchro')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>

    {{-- En-tête de l'application --}}
    <header class="app-header">
        {{-- Logo et éléments communs --}}
    </header>

    {{-- Barre de navigation --}}
    <nav class="app-navbar">
        {{-- Navigation commune à toutes les vues --}}
    </nav>

    {{-- Contenu propre à chaque page --}}
    <main class="app-content">
        @yield('content')
    </main>

    {{-- Pied de page --}}
    <footer class="app-footer">
        {{-- Pied de page commun --}}
    </footer>

    @stack('scripts')

</body>
</html>