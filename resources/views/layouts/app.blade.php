<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poissonnerie 3D - Dieu Donne Davantage @yield('title', 'Bienvenue')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/image1.png') }}" type="image/x-icon">
    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #1e40af;
            --dark-color: #1a1a1a;
            --light-color: #f8f9fa;
        }

        button, .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }

        button:hover, .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        html, body {
            height: 100%;
            scroll-behavior: smooth;
        }

        .page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .page-wrapper main {
            flex-grow: 1;
            padding-top: 70px;
        }

        /* Header Styles */
        .site-header {
            position: fixed;
            top: 0;
            width: 100%;
            background: white;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }

        .site-header.scrolled {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(5px);
        }

        .logo {
            font-weight: bold;
            color: var(--dark-color);
            font-size: 1.5rem;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        /* Hero Section */
        .hero {
            height: 70vh;
            min-height: 400px;
            position: relative;
            overflow: hidden;
        }
        
        .hero img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        
        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            text-align: center;
            z-index: 2;
            color: white;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-card {
            transition: all 0.3s;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: white;
        }

        .footer-links a {
            color: #ddd;
            transition: color 0.3s;
            display: block;
            margin-bottom: 8px;
        }

        .footer-links a:hover {
            color: white;
            text-decoration: none;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            margin: 0 5px;
            transition: all 0.3s;
        }

        .social-icon:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-3px);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero {
                height: 50vh;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }

            .product-image {
                height: 150px;
            }
        }

        @media (max-width: 576px) {
            .hero {
                height: 40vh;
                min-height: 300px;
            }

            .hero-content .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="site-header">
        <div class="container">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('images/image1.png') }}" alt="Logo Poissonnerie 3D">
                Poissonnerie 3D
            </a>

            <div class="menu-right">
                <a href="{{ route('login') }}" class="user-icon" title="Connexion">
                    <i class="fas fa-user"></i>
                </a>

                <div class="menu-toggle" id="menuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Mobile -->
    <nav class="site-nav" id="siteNav">
        <ul id="menuItems">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="#products">Nos Produits</a></li>
            <li><a href="#services">Nos Services</a></li>
            <li><a href="#about">À propos</a></li>
            <li><a href="#contact">Contact</a></li>
            @auth
                <li><a href="{{ route('compte.edit') }}">Mon compte</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-100">Se déconnecter</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Connexion</a></li>
                <li><a href="{{ route('register') }}">Inscription</a></li>
            @endauth
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="page-wrapper">
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="py-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Logo & Infos -->
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('images/image1.png') }}" alt="Logo" height="50" class="me-2">
                            <h4 class="mb-0">Poissonnerie 3D</h4>
                        </div>
                        <p>Produits frais – Service local – Bénin 🇧🇯</p>
                        <div class="mt-3">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>

                    <!-- Liens rapides -->
                    <div class="col-lg-4">
                        <h5 class="mb-3">Liens rapides</h5>
                        <div class="footer-links">
                            <a href="{{ url('/') }}">Accueil</a>
                            <a href="#products">Nos produits</a>
                            <a href="#services">Nos services</a>
                            <a href="#contact">Contact</a>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="col-lg-4" id="contact">
                        <h5 class="mb-3">Contact</h5>
                        @php
                            $infos = \App\Models\Information::first();
                        @endphp

                        @if ($infos)
                            <p><i class="fas fa-envelope me-2"></i> {{ $infos->email }}</p>
                            <p><i class="fas fa-phone me-2"></i> {{ $infos->telephone }}</p>
                            <p><i class="fas fa-map-marker-alt me-2"></i> {{ $infos->adresse }}</p>
                        @endif

                        <h5 class="mt-4">Horaires</h5>
                        @php
                            $horaires = \App\Models\Horaire::all();
                        @endphp

                        @if ($horaires->count())
                            <ul class="list-unstyled">
                                @foreach ($horaires as $horaire)
                                    <li>{{ $horaire->jour }} : {{ $horaire->heure_ouverture }} - {{ $horaire->heure_fermeture }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <hr class="my-4 bg-light">

                <div class="text-center pt-3">
                    &copy; {{ date('Y') }} <strong>Poissonnerie 3D</strong> – Tous droits réservés.
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        // Initialiser AOS animations
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Menu mobile
        document.addEventListener("DOMContentLoaded", function() {
            const toggle = document.getElementById("menuToggle");
            const nav = document.getElementById("siteNav");
            const items = document.querySelectorAll("#menuItems li");
            let isOpen = false;

            if (toggle && nav && items.length > 0) {
                toggle.addEventListener("click", () => {
                    toggle.classList.toggle("active");
                    nav.classList.toggle("open");
                    document.body.classList.toggle("menu-open");

                    if (!isOpen) {
                        items.forEach((item, index) => {
                            setTimeout(() => {
                                item.classList.add("show");
                            }, index * 100);
                        });
                    } else {
                        items.forEach((item, index) => {
                            setTimeout(() => {
                                item.classList.remove("show");
                            }, (items.length - index) * 50);
                        });
                    }

                    isOpen = !isOpen;
                });
            }

            // Header scroll effect
            window.addEventListener('scroll', function() {
                const header = document.querySelector('.site-header');
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>