<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
      $lowStockProducts = Product::whereColumn('Voorraad', '<', 'Minimale_voorraad')->get();

        $time = now();
        $hour = $time->hour;

        if ($hour >= 6 && $hour < 12) {
            $greeting = 'Goedemorgen';
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = 'Goedemiddag';
        } elseif ($hour >= 18 && $hour < 24) {
            $greeting = 'Goedenavond';
        } else {
            $greeting = 'Goedenacht';
        }

        return view('dashboard', compact('lowStockProducts', 'greeting'));
    }
}
