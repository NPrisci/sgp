@extends('layouts.app')

@section('content')
    <div class="container">
        
        <h2>Détails de la commande #{{ $commande->id }}</h2>
        <p>Statut : {{ $commande->statut }}</p>
        <p>Total : {{ $commande->total }} FCFA</p>
       <ul>
    @foreach ($commande->produits as $produit)
        <li>{{ $produit['nom'] ?? 'Produit inconnu' }}</li>
    @endforeach
</ul>

    </div>
@endsection
