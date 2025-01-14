<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Validator;

class UsersControllers extends Controller
{
    function index()
    {
        $allUsers = User::all();
        $totalUsers = $allUsers->count();
        $title = 'Hapus Users!';
        $text = "Apakah anda yakin ingin menghapus users ini?";
        confirmDelete($title, $text);
        return view('admin.partials.users.index', compact('allUsers', 'totalUsers'));
    }
    function create()
    {
        return view('admin.partials.users.create');
    }
    function store(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);
        Alert::success('Berhasil!', 'Users berhasil ditambahkan!');
        return redirect(route('users.index'));
    }
    function show()
    {

    }
    function edit()
    {

    }
    function delete($id_users)
    {
        $users = User::where('id', $id_users);
        $users->delete();
        Alert::success('Berhasil!', 'Data users berhasil dihapus!');
        return redirect(route('users.index'));
    }

}
