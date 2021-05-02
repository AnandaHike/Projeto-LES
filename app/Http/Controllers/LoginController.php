<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check())
            return redirect()->route('admin.dashboard.index');
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $user = User::select('id', 'function')->where('email', $request->email)->where('password', md5($request->password))->first();
        if ($user && Auth::loginUsingId($user->id)) {
            $request->session()->regenerate();
            if (strlen($user->secret_question) < 1)
                return redirect()->route('admin.auth.show')->with('error', 'Selecione uma pergunta secreta e uma resposta');

            return redirect()->route('admin.dashboard.index');
        }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.auth.login')->with('error', 'Erro ao fazer login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.auth.login');
    }
}
