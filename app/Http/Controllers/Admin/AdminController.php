<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;

class AdminController extends Controller
{
    public function dashboard()
{
    $clientsCount = User::where('role', 'client')->count();
    $produitsCount = Produit::count();
    $commandesCount = Commande::count();
    $totalVentes = Commande::where('statut', 'validée')->sum('total');
    
   $commandesRecentes = Commande::with('user')->latest()->take(5)->get();
    return view('admin.dashboard', compact(
        'clientsCount', 
        'produitsCount', 
        'commandesCount', 
        'totalVentes', 
        'commandesRecentes'
    ));
}
        public function dashboard1()
{
    $clientsCount = User::where('role', 'client')->count();
    $adminsCount = User::where('role', 'admin')->count();
    $produitsCount = Produit::count();
    $commandesCount = Commande::count();
    $totalVentes = Commande::where('statut', 'validée')->sum('total');
    
   $commandesRecentes = Commande::with('user')->latest()->take(5)->get();
    return view('admin.dashboard1', compact(
        'clientsCount',
        'adminsCount', 
        'produitsCount', 
        'commandesCount', 
        'totalVentes', 
        'commandesRecentes'
    ));
}
    public function index()
    {
        $clients=User::where('role','client')->get();
        return view ('client.index',compact('clients'));
    }

    public function inde()
    {
        // Affiche tous les admins sauf le super admin (id=1)
        $admins = User::where('role', 'admin')
                      ->where('id', '!=', 1)
                      ->get();

        return view('admin.gestion_admins', compact('admins'));
    }

    public function valider($id)
    {
        $admin = User::findOrFail($id);
        $admin->statut = 'actif';
        $admin->save();

        return back()->with('success', 'Compte validé avec succès.');
    }

    public function desactiver($id)
    {
        $admin = User::findOrFail($id);
        $admin->statut = 'désactivé';
        $admin->save();

        return back()->with('success', 'Compte désactivé.');
    }

    public function rejeter($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return back()->with('success', 'Compte supprimé.');
    }
}
