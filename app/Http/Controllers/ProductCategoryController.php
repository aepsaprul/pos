<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $product_category = ProductCategory::get();

        return view('pages.product_category.index', ['product_categories' => $product_category]);
    }

    public function create()
    {
        return view('pages.product_category.create');
    }

    public function store()
    {

    }
}
