<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.report.index');
    }

    public function getData()
    {
        $invoice = Invoice::with(['customer', 'user'])->orderBy('id', 'desc')->get();

        return response()->json([
            'invoices' => $invoice
        ]);
    }

    public function notCustomer()
    {
        $invoice = Invoice::with('user')
            ->whereNull('customer_id')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'invoices' => $invoice
        ]);
    }

    public function customer()
    {
        $invoice = Invoice::with(['customer', 'user'])
            ->whereNotNull('customer_id')
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'invoices' => $invoice
        ]);
    }
}
