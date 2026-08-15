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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        /* Navigation */
        nav {
            background: rgba(255, 255, 255, 0.95);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        nav a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        nav a:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        nav a.active {
            background: #667eea;
            color: white;
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
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.5s ease;
        }

        /* Typography */
        h1 {
            color: #667eea;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        h2 {
            color: #764ba2;
            font-size: 1.8rem;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        p {
            color: #555;
            line-height: 1.8;
            margin-bottom: 1rem;
            font-size: 1.05rem;
        }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid #667eea;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background: #764ba2;
            border-color: #764ba2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #667eea;
        }

        .btn-secondary:hover {
            background: #667eea;
            color: white;
        }

        /* Footer */
        footer {
            background: rgba(255, 255, 255, 0.95);
            padding: 1.5rem 2rem;
            text-align: center;
            color: #666;
            border-top: 1px solid #eee;
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
