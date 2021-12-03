<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\ProductShop;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.report.index');
    }

    public function salesGetData()
    {
        $invoice = Invoice::with(['customer', 'user'])->orderBy('id', 'desc')->get();

        return response()->json([
            'invoices' => $invoice
        ]);
    }

    public function salesNotCustomer()
    {
        $invoice = Invoice::with('user')
            ->whereNull('customer_id')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'invoices' => $invoice
        ]);
    }

    public function salesCustomer()
    {
        $invoice = Invoice::with(['customer', 'user'])
            ->whereNotNull('customer_id')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'invoices' => $invoice
        ]);
    }

    public function customerIndex()
    {
        $customer = Customer::get();

        return view('pages.report.customer', ['customers' => $customer]);
    }

    public function customerGetData()
    {
        $invoice = Invoice::with(['customer', 'user'])
            ->select(DB::raw('count(*) as transactions, customer_id'))
            ->whereNotNull('customer_id')
            ->groupBy('customer_id')
            ->orderBy('transactions', 'desc')
            ->get();

        return response()->json([
            'invoices' => $invoice
        ]);
    }

    public function customerDetail($id)
    {
        $invoice = Invoice::with(['customer', 'user'])->where('customer_id', $id)->get();

        return response()->json([
            'invoices' => $invoice
        ]);
    }

    public function productIndex()
    {
        $produk_shop = ProductShop::with('product')->get();

        return view('pages.report.product', ['product_shops' => $produk_shop]);
    }

    public function productGetData()
    {
        $sales = Sales::with(['user', 'invoice', 'product'])
            ->select(DB::raw('count(*) as sold, product_id, sum(quantity) as qty, sum(sub_total) as sub_total'))
            ->groupBy('product_id')
            ->orderBy('sold', 'desc')
            ->get();

        return response()->json([
            'sales' => $sales
        ]);
    }

    public function productDetail($id)
    {
        $sales = Sales::with(['user', 'invoice', 'product'])
            ->where('product_id', $id)
            ->get();

        return response()->json([
            'sales' => $sales
        ]);
    }
}
