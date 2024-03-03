<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use App\Http\Requests\StoreRegisterRequest;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show_user', [
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), 
        ]);

        return redirect()->route('home')->with('success', 'Rejestracja udana!');
    }
}
