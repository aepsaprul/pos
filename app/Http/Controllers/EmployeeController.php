<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

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
            'status' => 'Data berhasil diperbaharui'
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
