<?php

namespace App\Http\Controllers;

use App\Models\InventoryProductOut;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventroryProductOutController extends Controller
{
    public function index()
    {
        $productOut = InventoryProductOut::get();

        return view('pages.inventory_product_out.index', ['product_outs' => $productOut]);
    }

    public function create()
    {
        $product = Product::get();

        if (Auth::user()->employee) {
            $shop = Shop::where('id', '!=', Auth::user()->employee->shop->id)->get();
        } else {
            $shop = Shop::get();
        }

        return response()->json([
            'products' => $product,
            'shops' => $shop
        ]);
    }

    public function store(Request $request)
    {
        $productOut = new InventoryProductOut;
        $productOut->product_id = $request->product_id;
        $productOut->shop_id = $request->shop_id;
        $productOut->price = $request->price;
        $productOut->quantity = $request->quantity;
        $productOut->sub_total = $request->price * $request->quantity;
        $productOut->date = date('Y-m-d H:i:s');
        $productOut->user_id = Auth::user()->id;
        $productOut->save();

        return response()->json([
            'status' => "Data berhasil disimpan"
        ]);
    }

    public function edit($id)
    {
        $productOut = InventoryProductOut::find($id);
        $product = Product::get();
        $shop = Shop::get();

        return response()->json([
            'id' => $productOut->id,
            'product_id' => $productOut->product_id,
            'shop_id' => $productOut->shop_id,
            'price' => $productOut->price,
            'quantity' => $productOut->quantity,
            'products' => $product,
            'shops' => $shop
        ]);
    }

    public function update(Request $request)
    {
        $productOut = InventoryProductOut::find($request->id);
        $productOut->product_id = $request->product_id;
        $productOut->shop_id = $request->shop_id;
        $productOut->price = $request->price;
        $productOut->quantity = $request->quantity;
        $productOut->sub_total = $request->price * $request->quantity;
        $productOut->user_id = Auth::user()->id;
        $productOut->save();

        return response()->json([
            'status' => 'Data berhasil diperbaharui'
        ]);
    }

    public function deleteBtn($id)
    {
        $productOut = InventoryProductOut::find($id);

        return response()->json([
            'id' => $productOut->id,
            'name' => $productOut->product->name
        ]);
    }

    public function delete(Request $request)
    {
        $productOut = InventoryProductOut::find($request->id);
        $productOut->delete();

        return response()->json([
            'status' => 'Data berhasil dihapus'
        ]);
    }
}
