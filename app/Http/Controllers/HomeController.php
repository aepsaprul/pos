<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sales;
use App\Models\SalesTemporary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales = Sales::where('user_id', Auth::user()->id)->where('invoice_id', null)->get();
        $total_price = $sales->sum('sub_total');

        return view('home', ['sales' => $sales, 'total_price' => $total_price]);
    }

    public function getProduct(Request $request)
    {
        $product = Product::where('product_code', $request->product_code)->first();

        return response()->json([
            'product_id' => $product->id,
            'product_name' => $product->product_name,
            'stock' => $product->stock,
            'product_price' => $product->product_price
        ]);
    }

    public function salesSave(Request $request)
    {
        $sales = new Sales;
        $sales->user_id = Auth::user()->id;
        $sales->product_id = $request->product_id;
        $sales->quantity = $request->quantity;
        $sales->sub_total = $request->sub_total;
        $sales->save();

        return response()->json([
            'status' => "data berhasil ditambahkan"
        ]);
    }

    public function invoice()
    {

    }
}
