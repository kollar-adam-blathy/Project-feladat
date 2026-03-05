<!DOCTYPE html>
<html lang="hu" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - AutoRent Pro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar">
        <div class="navbar-content">
            <a href="/" class="logo">🚗 AutoRent Pro</a>
            <div class="mobile-menu" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-links" id="navLinks">
                <li><a href="/">Főoldal</a></li>
                <li><a href="/cars">Autók</a></li>
                @auth
                    <li><a href="/profile">Profilom</a></li>
                    <li><a href="/my-rentals">Bérléseim</a></li>
                    @if(Auth::check() && Auth::user()->is_admin)
                        <li><a href="/admin" style="color: var(--primary-cyan);">⚡ Admin</a></li>
                    @endif
                    <li><a href="/logout" style="opacity: 0.8;">Kilépés</a></li>
                @else
                    <li><a href="/login">Belépés</a></li>
                    <li><a href="/register" class="btn" style="padding: 0.5rem 1.25rem;">Regisztráció</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        }

        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);

            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('fade-in');
            });
        });
    </script>
</body>
</html>
