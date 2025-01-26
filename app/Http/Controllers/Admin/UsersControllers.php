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
    function show(Request $request, $id_users)
    {
        $data = User::findOrFail($id_users);
        return view('admin.partials.users.show', compact('data'));
    }
    function update(Request $request, $id_users)
    {
        if ($request->input('password' == null)) {
            User::where('id', $id_users)->update([
                'name' => $request->input('name'),
                'username' => $request->input('username')
            ]);
            Alert::success('Berhasil!', 'Users berhasil diubah!');
            return redirect(route('users.index'));
        } else {
            User::where('id', $id_users)->update([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password'))
            ]);
            Alert::success('Berhasil!', 'Users berhasil diubah!');
            return redirect(route('users.index'));
        }
    }
    function delete($id_users)
    {
        $users = User::where('id', $id_users);
        $users->delete();
        Alert::success('Berhasil!', 'Data users berhasil dihapus!');
        return redirect(route('users.index'));
    }

}
