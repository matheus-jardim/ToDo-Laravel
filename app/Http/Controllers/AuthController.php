<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        if(Auth::check()) {
            return redirect(route('home'));
        }
        return view('login');
    }

    public function login_action(Request $request) {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        if (Auth::attempt($validator)) {
            return redirect(route('home'));
        };
    }

    public function register() {
        $isLoggedIn = Auth::check();
        if($isLoggedIn) {
            return redirect(route('home'));
        }
        return view('register');
    }

    public function register_action(Request $request) {
        /* 
        *******************************
        Regras para registro

        x O usuário tem que ter um nome
        x O email tem que ser único na tabela users
        x Todos os campos são REQUIRED
        x Password tem que ter no mínimo 6 caracteres

        *******************************
        */
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation'
        ]);

        $data = $request->only('name', 'email', 'password');

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect(route('login'));
    }

    public function logout() {
        Auth::logout();

        return redirect(route('login'));
    }

}
