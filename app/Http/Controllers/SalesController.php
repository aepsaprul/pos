<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Invoice::get();

        return view('pages.sales.index', ['sales' => $sales]);
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
