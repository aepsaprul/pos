<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $category = ProductCategory::get();

        return view('pages.product_category.index', ['categories' => $category]);
    }

    public function create()
    {
        return view('pages.product_category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required'
        ]);

        $category = new ProductCategory;
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->route('produk_category.index')->with('status', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $category = ProductCategory::find($id);
        return view('pages.product_category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category_name' => 'required'
        ]);

        $category = ProductCategory::find($id);
        $category->category_name = $request->category_name;
        $category->save();

        return redirect()->route('produk_category.index')->with('status', 'Data berhasil diperbaharui');
    }

    public function delete($id)
    {
        $category = ProductCategory::find($id);
        $category->delete();

        return redirect()->route('produk_category.index')->with('status', 'Data berhasil dihapus');
    }
}
