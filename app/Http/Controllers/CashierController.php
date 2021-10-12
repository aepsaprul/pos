<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
{
    public function index()
    {
        $sales = Sales::with('product')->where('user_id', Auth::user()->id)->where('invoice_id', null)->get();
        $total_price = $sales->sum('sub_total');

        return view('pages.cashier.index', ['sales' => $sales, 'total_price' => $total_price]);
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

    public function invoice(Request $request)
    {
        $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
        $shuffle  = substr(str_shuffle($char), 0, 5);

        $invoice = new Invoice();

        if ($request->customer_id) {
            $invoice->customer_id = $request->customer_id;
        }

        $invoice->total_amount = $request->total_amount;
        $invoice->date_recorded = date('Y-m-d H:i:s');
        $invoice->user_id = Auth::user()->id;
        $invoice->code = $shuffle;
        $invoice->save();

        $sales = Sales::where('user_id', Auth::user()->id)->where('invoice_id', null);
        $sales->invoice_id = $invoice->id;
        $sales->save();
    }
}
