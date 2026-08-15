<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Welcome')</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Tahoma', Geneva, sans-serif;
        }

        html, body {
            height: 100%;
            background: #f3f3f3;
            min-height: 100vh;
            color: #111;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        /* Navigation */
        nav {
            background: rgba(17, 17, 17, 0.96);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.18);
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        nav a {
            color: #f5f5f5;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        nav a:hover {
            background: #ffffff;
            color: #111;
            border-color: #ffffff;
        }

        nav a.active {
            background: #ffffff;
            color: #111;
        }

        /* Main Content */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .container {
            width: 100%;
            max-width: 900px;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
            border: 1px solid #e5e5e5;
            animation: slideUp 0.5s ease;
        }

        /* Typography */
        h1 {
            color: #111111;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        h2 {
            color: #222222;
            font-size: 1.8rem;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        p {
            color: #444;
            line-height: 1.8;
            margin-bottom: 1rem;
            font-size: 1.05rem;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #111111;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid #111111;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background: #333333;
            border-color: #333333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            background: transparent;
            color: #111111;
            border-color: #111111;
        }

        .btn-secondary:hover {
            background: #111111;
            color: white;
        }

        /* Footer */
        footer {
            background: rgba(17, 17, 17, 0.97);
            padding: 1.5rem 2rem;
            text-align: center;
            color: #f5f5f5;
            border-top: 1px solid #2d2d2d;
            margin-top: auto;
        }

        footer p {
            margin: 0;
            font-size: 0.95rem;
        }

        /* Animations */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            nav {
                gap: 0.5rem;
                flex-wrap: wrap;
            }

            nav a {
                padding: 0.4rem 0.8rem;
                font-size: 0.9rem;
            }

            .container {
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.8rem;
            }

            h2 {
                font-size: 1.4rem;
            }

            main {
                padding: 1rem;
            }
        }

        @yield('additional_styles')
    </style>

    @yield('styles')
</head>
<body>
    <nav>
        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
        <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a>
        <a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a>
    </nav>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} My Awesome Laravel App. All rights reserved.</p>
    </footer>

    @yield('scripts')
</body>
</html>
