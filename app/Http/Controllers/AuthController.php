<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function form(){
        return view('users.login');
    }

    public function login(LoginRequest $request){

        /*$credentials = [
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
        ];
        
        if (Auth::attempt($credentials, $request->boolean('remember_me'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        else{
            return back()->withErrors([
                'email' => 'Login lub hasło nie są poprawne.'
            ]);
        }*/
        echo "Jebać laravela";
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Pomyślnie wylogowano');
    }
}
