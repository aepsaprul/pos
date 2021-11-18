<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::orderBy('id', 'desc')->get();

        return view('pages.employee.index', ['employees' => $employee]);
    }

    public function store(Request $request)
    {
        $employee = new Employee;

        if (Auth::user()->employee->shop) {
            $employee->shop_id = Auth::user()->employee->shop->id;
        }

        $employee->full_name = $request->full_name;
        $employee->nickname = $request->nickname;
        $employee->email = $request->email;
        $employee->contact = $request->contact;
        $employee->address = $request->address;
        $employee->save();

        return response()->json([
            'status' => 'Data berhasil disimpan'
        ]);
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        return response()->json([
            'id' => $employee->id,
            'full_name' => $employee->full_name,
            'nickname' => $employee->nickname,
            'email' => $employee->email,
            'contact' => $employee->contact,
            'address' => $employee->address
        ]);
    }

    public function edit($id)
    {
        $employee = Employee::find($id);

        return response()->json([
            'id' => $employee->id,
            'full_name' => $employee->full_name,
            'nickname' => $employee->nickname,
            'email' => $employee->email,
            'contact' => $employee->contact,
            'address' => $employee->address
        ]);
    }

    public function update(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->full_name = $request->full_name;
        $employee->nickname = $request->nickname;
        $employee->email = $request->email;
        $employee->contact = $request->contact;
        $employee->address = $request->address;
        $employee->save();

        return response()->json([
            'status' => 'Data berhasil diperbaharui',
            'id' => $request->id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'contact' => $request->contact
        ]);
    }

    public function deleteBtn($id)
    {
        $employee = Employee::find($id);

        return response()->json([
            'id' => $employee->id,
            'full_name' => $employee->full_name
        ]);
    }

    public function delete(Request $request)
    {
        $employee = Employee::find($request->id);
        $employee->delete();

        return response()->json([
            'status' => 'Data berhasil dihapus'
        ]);
    }
}
