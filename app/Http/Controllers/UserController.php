<?php

namespace App\Http\Controllers;

use App\Models\NavMain;
use App\Models\NavMainUser;
use App\Models\NavSubUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('roles', '!=', 'administrator')->get();

        return view('pages.user.index', ['users' => $user]);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->roles = $request->roles;
        $user->save();

        return response()->json([
            'status' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->roles
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles = $request->roles;
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

    public function akses($id)
    {
        $user = User::find($id);
        // menu utama
        $navMainUser = NavMainUser::where('user_id', $id)->get();
        $nav_main = NavMain::get();

        // menu sub
        $navSubUser = NavSubUser::where('user_id', $id)->get();

        return view('pages.user.access', [
            'user' => $user,
            'nav_mains' => $nav_main,
            'nav_main_users' => $navMainUser,
            'nav_sub_users' => $navSubUser
        ]);
    }

    public function aksesSimpan(Request $request, $id)
    {
        // dd($request);

        // menu utama
        $navMainUser = NavMainUser::where('user_id', $id)->get();

        if (count($navMainUser) == 0) {
            foreach ($request->nav_main as $key => $item) {
                $navMainUserCreate = new NavMainUser;
                $navMainUserCreate->user_id = $id;
                $navMainUserCreate->nav_main_id = $item;
                $navMainUserCreate->save();
            }
        } else {
            $navMainUserHapus = NavMainUser::where('user_id', $request->id);
            $navMainUserHapus->delete();

            foreach ($request->nav_main as $key => $item) {
                $navMainUserCreate = new NavMainUser;
                $navMainUserCreate->user_id = $id;
                $navMainUserCreate->nav_main_id = $item;
                $navMainUserCreate->save();
            }
        }

        // menu sub
        if ($request->nav_sub) {
            # code...
            $navSubUser = NavSubUser::where('user_id', $id)->get();

            if (count($navSubUser) == 0) {

                foreach ($request->nav_sub as $key => $item) {
                    $navSubUserCreate = new NavSubUser;
                    $navSubUserCreate->user_id = $id;
                    $navSubUserCreate->nav_sub_id = $item;
                    $navSubUserCreate->save();
                }
            } else {
                $navSubUserHapus = NavSubUser::where('user_id', $request->id);
                $navSubUserHapus->delete();

                foreach ($request->nav_sub as $key => $item) {
                    $navSubUserCreate = new NavSubUser;
                    $navSubUserCreate->user_id = $id;
                    $navSubUserCreate->nav_sub_id = $item;
                    $navSubUserCreate->save();
                }
            }
        } else {
            $navSubUserHapus = NavSubUser::where('user_id', $request->id);
            $navSubUserHapus->delete();
        }

        return redirect()->route('user.index');
    }
}
