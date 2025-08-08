@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Produits de la catégorie : {{ $categorie->nom }}</h2>

    <a href="{{ route('produits.index') }}" class="btn btn-secondary mb-4">
        ← Retour aux catégories
    </a>

    <div class="row">
        @forelse($produits as $produit)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm produit-card">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $produit->nom }}</h5>
                            <p class="card-text">Prix : {{ number_format($produit->prix, 0, ',', ' ') }} F</p>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-warning btn-sm me-2">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Confirmer la suppression ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Aucun produit dans cette catégorie.</p>
        @endforelse
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('produits.create', $categorie->id) }}" class="btn btn-success btn-lg">
            <i class="fas fa-plus"></i> Ajouter un produit
        </a>
    </div>
</div>
@push('styles')
<style>
    .produit-card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s;
    }
    .produit-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>
@endpush
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@endsection
