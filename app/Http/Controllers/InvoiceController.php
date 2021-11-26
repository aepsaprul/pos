<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Sales;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoice = Invoice::get();
        return view('pages.invoice.index', ['invoices' => $invoice]);
    }

    public function show($id)
    {
        $invoice = Invoice::find($id);
        $sales = Sales::with('product')->where('invoice_id', $invoice->id)->get();

        return response()->json([
            'code' => $invoice->code,
            'date' => date('d-m-Y', strtotime($invoice->date_recorded)),
            'total_amount' => $invoice->total_amount,
            'sales' => $sales
        ]);
    }

    public function deleteBtn($id)
    {
        $invoice = Invoice::find($id);

        return response()->json([
            'id' => $invoice->id,
            'code' => $invoice->code
        ]);
    }

    public function delete(Request $request)
    {
        $invoice = Invoice::find($request->id);
        $invoice->delete();

        $sales = Sales::where('invoice_id', $invoice->id);
        $sales->delete();

        return response()->json([
            'status' => 'Data berhasil dihapus'
        ]);
    }
}
