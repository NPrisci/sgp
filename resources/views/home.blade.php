@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero position-relative">
    <img src="{{ asset('images/kan.png') }}" 
         alt="Poissonnerie 3D"
         class="w-100 h-100">
    
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
        <h1 class="display-3 fw-bold mb-3" data-aos="fade-down">Poissonnerie 3D</h1>
        <p class="lead mb-4" data-aos="fade-down" data-aos-delay="100">Dieu Donne Davantage - La fraîcheur de la mer à votre service</p>
        
        <div class="d-flex justify-content-center gap-3 flex-wrap" data-aos="fade-up" data-aos-delay="200">
            <a href="#contact" class="btn btn-outline-light btn-lg px-4">Nos horaires</a>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4">Créer un compte</a>
        </div>
    </div>
</section>

<!-- Présentation -->
<section class="container py-5" id="about">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
            <img src="{{ asset('images/image9.png') }}" 
                 alt="Poissonnerie"
                 class="img-fluid rounded shadow-lg"
                 style="max-height: 500px; width: 100%; object-fit: cover;">
        </div>

        <div class="col-lg-6" data-aos="fade-left">
            <h2 class="fw-bold mb-4">Qui sommes-nous ?</h2>
            <p class="lead text-muted mb-4">
                La Poissonnerie 3D vous propose chaque jour le meilleur de la mer : poissons frais, crustacés, fruits de mer, et plus encore.
            </p>
            <p>
                Située au cœur de la ville, notre boutique est synonyme de fraîcheur et de qualité. Nous travaillons directement avec les pêcheurs locaux pour vous offrir des produits de la mer d'une fraîcheur incomparable.
            </p>
        </div>
    </div>
</section>

<!-- Nos services -->
<section class="bg-light py-5" id="services">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0" data-aos="fade-left">
                <img src="{{ asset('images/image1.png') }}" 
                     alt="Services"
                     class="img-fluid rounded shadow-lg"
                     style="max-height: 500px; width: 100%; object-fit: cover;">
            </div>
            
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="fw-bold mb-4">Nos services</h2>
                <div class="service-item mb-3">
                    <h5><i class="fas fa-cut text-primary me-2"></i> Découpe sur mesure</h5>
                    <p class="text-muted">Nous préparons vos poissons selon vos préférences.</p>
                </div>
                <div class="service-item mb-3">
                    <h5><i class="fas fa-truck text-primary me-2"></i> Livraison à domicile</h5>
                    <p class="text-muted">Service de livraison rapide et soigné.</p>
                </div>
                <div class="service-item">
                    <h5><i class="fas fa-utensils text-primary me-2"></i> Conseils culinaires</h5>
                    <p class="text-muted">Nos experts vous conseillent pour préparer vos produits.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Nos produits -->
<section class="container py-5" id="products">
    <h2 class="text-center fw-bold mb-5">Nos Produits</h2>
    <div class="product-grid">
        <div class="product-card" data-aos="zoom-in">
            <img src="{{ asset('images/poisson10.jpg') }}" 
                 class="product-image"
                 alt="Dorade Royale">
            <div class="p-3">
                <h5 class="text-center">Dorade Royale</h5>
                <p class="text-muted text-center small">Produit frais du jour</p>
            </div>
        </div>
        
        <div class="product-card" data-aos="zoom-in" data-aos-delay="100">
            <img src="{{ asset('images/poisson9.webp') }}" 
                 class="product-image"
                 alt="Crevettes Roses">
            <div class="p-3">
                <h5 class="text-center">Crevettes Roses</h5>
                <p class="text-muted text-center small">Pêchées localement</p>
            </div>
        </div>
        
        <div class="product-card" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ asset('images/poisson3.jpg') }}" 
                 class="product-image"
                 alt="Homard Bleu">
            <div class="p-3">
                <h5 class="text-center">Homard Bleu</h5>
                <p class="text-muted text-center small">Produit de luxe</p>
            </div>
        </div>
        
        <div class="product-card" data-aos="zoom-in">
            <img src="{{ asset('images/image2.png') }}" 
                 class="product-image"
                 alt="Saucisse">
            <div class="p-3">
                <h5 class="text-center">Saucisse</h5>
                <p class="text-muted text-center small">Maison</p>
            </div>
        </div>
        
        <div class="product-card" data-aos="zoom-in" data-aos-delay="100">
            <img src="{{ asset('images/image4.jpeg') }}" 
                 class="product-image"
                 alt="Viande Fraiche">
            <div class="p-3">
                <h5 class="text-center">Viande Fraiche</h5>
                <p class="text-muted text-center small">Qualité premium</p>
            </div>
        </div>
        
        <div class="product-card" data-aos="zoom-in" data-aos-delay="200">
            <img src="{{ asset('images/poissons3.jpg') }}" 
                 class="product-image"
                 alt="Poisson Frais">
            <div class="p-3">
                <h5 class="text-center">Poisson Frais</h5>
                <p class="text-muted text-center small">Arrivage du jour</p>
            </div>
        </div>
    </div>
</section>

<!-- Carrousel -->
<section class="container my-5">
    <div id="carouselProduits" class="carousel slide shadow-lg" data-bs-ride="carousel" data-aos="fade-up">
        <div class="carousel-inner rounded-3 overflow-hidden">
            <div class="carousel-item active">
                <img src="{{ asset('images/ois1.jpg') }}" 
                     class="d-block w-100" 
                     alt="Photo 1"
                     style="height: 500px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/pois2.jpg') }}" 
                     class="d-block w-100" 
                     alt="Photo 2"
                     style="height: 500px; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/pois3.jpg') }}" 
                     class="d-block w-100" 
                     alt="Photo 3"
                     style="height: 500px; object-fit: cover;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduits" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselProduits" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</section>

<!-- Actualités -->
<section class="container py-5">
    <h2 class="text-center fw-bold mb-5">Actualités & Recettes</h2>
    <div class="row g-4">
        <div class="col-md-6" data-aos="fade-right">
            <div class="card h-100 border-0 shadow-sm">
                <img src="{{ asset('images/recipe1.jpg') }}" 
                     class="card-img-top"
                     alt="Recette"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5>Recette du mois : Filet de bar au citron</h5>
                    <p class="text-muted">Découvrez comment cuisiner un délicieux filet de bar avec une touche d'agrumes...</p>
                    <a href="#" class="btn btn-outline-primary">Lire la suite</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-6" data-aos="fade-left">
            <div class="card h-100 border-0 shadow-sm">
                <img src="{{ asset('images/arrival.jpg') }}" 
                     class="card-img-top"
                     alt="Arrivage"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5>Arrivage spécial : Fruits de mer</h5>
                    <p class="text-muted">Cette semaine, profitez d'un arrivage exceptionnel de palourdes, bulots et moules fraîches...</p>
                    <a href="#" class="btn btn-outline-primary">Lire la suite</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection