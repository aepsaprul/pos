<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ReceiveProduct;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiveProductController extends Controller
{
    public function index()
    {
        $receive_product = ReceiveProduct::get();
        return view('pages.receive_product.index', ['receive_products' => $receive_product]);
    }

    public function create()
    {
        $product = Product::get();

        return response()->json([
            'product' => $product,
        ]);
    }

    public function store(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $product->stock = $product->stock + $request->quantity;
        $product->save();

        $receive_product = new ReceiveProduct;
        $receive_product->user_id = Auth::user()->id;
        $receive_product->product_id = $request->product_id;
        $receive_product->price = $product->product_price;
        $receive_product->quantity = $request->quantity;
        $receive_product->sub_total = $request->quantity * $product->product_price;
        $receive_product->date = date('Y-m-d H:i:s');
        $receive_product->save();

        return response()->json([
            'status' => 'Data berhasil di simpan'
        ]);
    }

    public function edit($id)
    {
        $received_product = ReceiveProduct::find($id);
        $product = Product::get();

        return response()->json([
            'received_product_id' => $received_product->id,
            'product_id' => $received_product->product_id,
            'quantity' => $received_product->quantity,
            'products' => $product
        ]);
    }

    public function update(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();

        $receive_product = ReceiveProduct::find($request->id);
        $receive_product->user_id = Auth::user()->id;
        $receive_product->product_id = $request->product_id;
        $receive_product->price = $product->product_price;
        $receive_product->quantity = $request->quantity;
        $receive_product->sub_total = $request->quantity * $product->product_price;
        $receive_product->date = date('Y-m-d H:i:s');
        $receive_product->save();

        return response()->json([
            'status' => 'Data berhasil diperbaharui'
        ]);
    }

    public function deleteBtn($id)
    {
        $received_product = ReceiveProduct::find($id);

        return response()->json([
            'id' => $received_product->id,
            'product_name' => $received_product->product->product_name
        ]);
    }

    public function delete(Request $request)
    {
        $received_product = ReceiveProduct::find($request->id);
        $received_product->delete();

        return response()->json([
            'status' => 'Data berhasil dihapus'
        ]);
    }
}
