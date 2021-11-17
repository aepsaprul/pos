<?php

namespace App\Http\Controllers;

use App\Models\NavMain;
use App\Models\NavMainUser;
use App\Models\NavSubUser;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('roles')->where('roles_id', '!=', '0')->get();

        return view('pages.user.index', ['users' => $user]);
    }

    public function create()
    {
        $roles = Roles::get();

        return response()->json([
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles_id = $request->roles;
        $user->save();

        return response()->json([
            'status' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Roles::get();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles_id' => $user->roles_id,
            'roles' => $roles
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles_id = $request->roles;
        $user->save();

        return response()->json([
            'status' => 'Data berhasil diperbaharui'
        ]);
    }

    public function deleteBtn($id)
    {
        $user = User::find($id);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name
        ]);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return response()->json([
            'status' => 'Data berhasil dihapus'
        ]);
    }
}
