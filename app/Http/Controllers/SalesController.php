<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Invoice::get();

        return view('pages.sales.index', ['sales' => $sales]);
    }
}
