<!DOCTYPE html>
<html lang="hu" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - AutoRent Pro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #0066FF;
            --primary-light: #3B82F6;
            --primary-dark: #1E40AF;
            --accent-blue: #60A5FA;
            --bg-primary: #0B1120;
            --bg-secondary: #1A1F35;
            --bg-card: #1E2639;
            --text-primary: #FFFFFF;
            --text-secondary: #94A3B8;
            --border-color: rgba(59, 130, 246, 0.2);
            --glass-bg: rgba(30, 38, 57, 0.6);
            --glass-border: rgba(59, 130, 246, 0.15);
        }

        [data-theme="dark"], [data-theme="light"] {
            --bg-main: #0B1120;
            --bg-secondary: #1A1F35;
            --text-primary: #FFFFFF;
            --text-secondary: #94A3B8;
            --card-bg: rgba(30, 38, 57, 0.6);
            --border-color: rgba(59, 130, 246, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(180deg, #0B1120 0%, #151B2E 50%, #0B1120 100%);
            background-attachment: fixed;
            color: var(--text-primary);
            min-height: 100vh;
            line-height: 1.6;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 40%, rgba(0, 102, 255, 0.08) 0%, transparent 60%),
                        radial-gradient(circle at 70% 60%, rgba(59, 130, 246, 0.06) 0%, transparent 60%);
            pointer-events: none;
            z-index: 0;
        }

        .navbar {
            background: rgba(30, 38, 57, 0.8);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.2);
            padding: 1.25rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #FFFFFF;
            letter-spacing: -0.5px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo:hover {
            color: var(--primary-blue);
        }
        
        .nav-links {
            display: flex;
            gap: 2.5rem;
            list-style: none;
            align-items: center;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--text-primary);
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-blue);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-links a:hover {
            color: var(--primary-blue);
        }

        .theme-toggle {
            width: 50px;
            height: 26px;
            background: var(--border-color);
            border-radius: 30px;
            cursor: pointer;
            position: relative;
            transition: background 0.3s ease;
        }

        .theme-toggle::before {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 20px;
            height: 20px;
            background: var(--primary-cyan);
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        [data-theme="dark"] .theme-toggle::before {
            transform: translateX(24px);
        }

        .btn {
            display: inline-block;
            padding: 0.875rem 1.75rem;
            background: var(--primary-blue);
            color: #FFFFFF;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 600;
            transition: all 0.2s ease;
            text-align: center;
        }
        
        .btn:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(0, 102, 255, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: rgba(59, 130, 246, 0.2);
            color: var(--primary-blue);
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(59, 130, 246, 0.3);
            border-color: var(--primary-blue);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
        }

        .btn-outline:hover {
            background: rgba(0, 102, 255, 0.1);
            border-color: var(--primary-light);
        }

        .container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }
        
        .card {
            background: rgba(30, 38, 57, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(59, 130, 246, 0.2);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 32px rgba(0, 102, 255, 0.3);
            border-color: rgba(59, 130, 246, 0.4);
        }

        .grid {
            display: grid;
            gap: 2rem;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .hero {
            background: rgba(30, 38, 57, 0.5);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 4rem 2rem;
            border-radius: 20px;
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(0, 102, 255, 0.1) 0%, transparent 60%);
            animation: pulse 8s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            color: var(--text-light);
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .hero p {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            position: relative;
            z-index: 1;
        }
        
        h1, h2, h3 {
            color: var(--text-primary);
            font-weight: 700;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 8px;
            font-size: 1rem;
            background: rgba(30, 38, 57, 0.8);
            backdrop-filter: blur(10px);
            color: var(--text-primary);
            transition: all 0.2s ease;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-blue);
            background: rgba(30, 38, 57, 0.95);
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.2);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 1rem;
        }
        
        th, td {
            padding: 1rem;
            text-align: left;
        }
        
        th {
            background: rgba(0, 102, 255, 0.1);
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--primary-blue);
        }

        th:first-child {
            border-radius: 12px 0 0 0;
        }

        th:last-child {
            border-radius: 0 12px 0 0;
        }

        td {
            border-bottom: 1px solid var(--border-color);
            color: var(--text-primary);
        }
        
        tr:hover td {
            background: var(--glass-bg);
        }

        tr:last-child td:first-child {
            border-radius: 0 0 0 12px;
        }

        tr:last-child td:last-child {
            border-radius: 0 0 12px 0;
        }
        
        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .badge {
            display: inline-block;
            padding: 0.4rem 0.875rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .badge-success {
            background: rgba(16, 185, 129, 0.2);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        
        .badge-warning {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
        
        .badge-danger {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .badge-info {
            background: rgba(0, 102, 255, 0.2);
            color: var(--primary-blue);
            border: 1px solid rgba(0, 102, 255, 0.3);
        }

        .auth-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .mobile-menu {
            display: none;
            cursor: pointer;
            flex-direction: column;
            gap: 5px;
        }

        .mobile-menu span {
            width: 25px;
            height: 3px;
            background: var(--text-primary);
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--card-bg);
                flex-direction: column;
                padding: 1rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .nav-links.active {
                display: flex;
            }

            .mobile-menu {
                display: flex;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
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
