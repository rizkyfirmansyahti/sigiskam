<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UsersControllers extends Controller
{
    function index()
    {
        $allUsers = User::all();
        return view('admin.partials.users.index', compact('allUsers'));
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
        return redirect(route('users.index'));
    }

}
