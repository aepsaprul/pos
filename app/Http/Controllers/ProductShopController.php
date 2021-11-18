<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductShop;
use Illuminate\Http\Request;

class ProductShopController extends Controller
{
    public function index()
    {
        $product_shop = ProductShop::orderBy('id', 'desc')->get();

        return view('pages.product_shop.index', ['product_shops' => $product_shop]);
    }

    public function create()
    {
        $product = Product::get();

        return response()->json([
            'products' => $product
        ]);
    }

    public function store(Request $request)
    {
        $product_shop = new ProductShop;
        $product_shop->product_id = $request->product_id;
        $product_shop->shop_id = $request->shop_id;
        $product_shop->code = $request->code;
        $product_shop->price = $request->price;
        $product_shop->price_selling = $request->price_selling;
        $product_shop->save();

        return response()->json([
            'status' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $product_shop = ProductShop::find($id);
        $product = Product::get();

        return response()->json([
            'id' => $product_shop->id,
            'product_id' => $product_shop->product_id,
            'shop_id' => $product_shop->shop_id,
            'code' => $product_shop->code,
            'price' => $product_shop->price,
            'price_selling' => $product_shop->price_selling,
            'products' => $product
        ]);
    }

    public function update(Request $request)
    {
        $product_shop = ProductShop::find($request->id);
        $product_shop->product_id = $request->product_id;
        $product_shop->shop_id = $request->shop_id;
        $product_shop->code = $request->code;
        $product_shop->price = $request->price;
        $product_shop->price_selling = $request->price_selling;
        $product_shop->save();

        $product = Product::find($request->product_id);

        return response()->json([
            'status' => 'Data berhasil diperbaharui',
            'id' => $request->id,
            'product_name' => $product->product_name,
            'category_name' => $product->category->category_name,
            'code' => $request->code,
            'price' => $request->price,
            'price_selling' => $request->price_selling
        ]);
    }

    public function deleteBtn($id)
    {
        $product_shop = ProductShop::find($id);


        return response()->json([
            'id' => $product_shop->id,
            'product_name' => $product_shop->product->product_name
        ]);
    }

    public function delete(Request $request)
    {
        $product_shop = ProductShop::find($request->id);
        $product_shop->delete();

        return response()->json([
            'status' => 'Data berhasil dihapus'
        ]);
    }
}
