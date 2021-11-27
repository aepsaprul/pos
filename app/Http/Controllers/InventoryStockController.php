<?php

namespace App\Http\Controllers;

use App\Models\InventoryProductIn;
use App\Models\InventoryStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryStockController extends Controller
{
    public function index()
    {
        return view('pages.inventory_stock.index');
    }

    public function getData() {
        $stock = InventoryProductIn::with('product')
            ->groupBy('product_id')
            ->get(array(DB::raw('COUNT(id) as total'), 'product_id', DB::raw('SUM(quantity) as qty')));

        return response()->json([
            'stocks' => $stock
        ]);
    }

    public function low()
    {
        $stock = InventoryStock::with('product')->whereBetween('stock', [1, 20])->get();

        return response()->json([
            'stocks' => $stock
        ]);
    }

    public function empty()
    {
        $stock = InventoryStock::with('product')->where('stock', 0)->get();

        return response()->json([
            'stocks' => $stock
        ]);
    }
}
