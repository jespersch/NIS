<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\MaterialsStock;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Low stock products and materials logic
        $lowStockProducts = Product::whereColumn('stock', '<', 'minstock')->get();
        $lowStockMaterials = MaterialsStock::whereColumn('stock', '<', 'minstock')->get();

        // Greeting logic based on current time
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

        // Orders data for Chart.js
        $orders = Order::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as date"), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->get();


        // Orders data for Chart.js
        $totalStockData = Product::select('name', DB::raw('sum(stock) as total_stock'))
         ->groupBy('name')
         ->get();

        return view('dashboard', compact('lowStockProducts', 'lowStockMaterials', 'greeting', 'orders', 'totalStockData'));
    }
}
