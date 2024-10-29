<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    
    public function create()
    {
        return view('user.create');
    }

   
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }

    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'status' => 'required|boolean',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('user.show', $user->id);
    }

   
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'status' => 'required|boolean',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
            'password' => $request->filled('password') ? Hash::make($request->input('password')) : $user->password,
        ]);

        return redirect()->route('user.show', $user->id);
    }

    
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index');
    }
}
