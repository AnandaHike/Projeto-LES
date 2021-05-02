<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where(function ($query) use ($request) {
            if (Route::currentRouteName() === 'admin.dashboard.clients.index')
                $query->where('function', 'client');
            else
                $query->where('function', '<>', 'client');

            if ($request->full_name)
                $query->where('full_name', 'like', '%' . $request->full_name . '%');

            if ($request->email)
                $query->where('email', 'like', '%' . $request->email . '%');

            if ($request->cpf)
                $query->where('cpf', 'like', '%' . $request->cpf . '%');
        })->get();

        if (Route::currentRouteName() === 'admin.dashboard.clients.index')
            return view('admin.clients.index', ['users' => $users]);
        else 
        if (Route::currentRouteName() === 'admin.dashboard.users.index')
            return view('admin.users.index', ['users' => $users]);
        abort(403);
    }

    public function create()
    {
        if (Route::currentRouteName() === 'admin.auth.create')
            return view('admin.create');
        else if (Route::currentRouteName() === 'admin.dashboard.clients.create')
            return view('admin.clients.create');
        else if (Route::currentRouteName() === 'admin.dashboard.users.create')
            return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => ['required'],
            'email' => ['required', 'unique:users'],
            'cpf' => ['required', 'unique:users'],
            'cellphone' => ['required', 'unique:users'],
            'password' => ['required'],
        ]);

        if ($request->password != $request->password_confirm) {
            return back()->with('error', 'Senhas não coincidem');
        }

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'cellphone' => $request->cellphone,
            'secret_question' => $request->secret_question,
            'secret_answer' => $request->secret_answer,
            'password' => md5($request->password),
            'function' => $request->function ?? 'client',
        ]);

        if (Route::currentRouteName() === 'admin.auth.create')
            return redirect()->route('admin.auth.login')->with('success', 'Conta criada com sucesso');
        else return back()->with('sucess', 'Usuário criado com sucesso');
    }

    public function show(User $user)
    {
        return view('admin.my-account', ['user' => User::where('id', Auth::id())->first()]);
    }

    public function edit(User $user, $id)
    {
        $user = User::where('id', $id)->first();
        return view("admin.users.edit", ['user' => $user]);
    }

    public function editClient(User $user, $id)
    {
        $user = User::where('id', $id)->first();
        return view("admin.clients.edit", ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $user = User::where('id', $request->id ?? Auth::id())->first();
        $request->validate([
            'full_name' => ['required'],
            'email' => ['required', 'unique:users,email,' . $user->id],
            'cpf' => ['required', 'unique:users,cpf,' . $user->id],
        ]);

        $user->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'secret_question' => $request->secret_question,
            'secret_answer' => $request->secret_answer,
        ]);

        return back()->with('success', 'Editado com sucesso');
    }

    public function destroy(User $user, $id)
    {
        User::where('id', $id)->delete();

        return back();
    }

    public function forgot()
    {
        return view('admin.forgot.forgot');
    }

    public function forgot2(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user)
            if ($user->secret_question)
                return view('admin.forgot.forgot-2', ['user' => $user]);
            else return redirect()->route('admin.auth.login')->with('error', 'Você não possui senha secreta, por favor entrar em contato com o administrador');

        else return redirect()->route('admin.auth.forgot')->with('error', 'Email incorreto');
    }

    public function forgot3(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if ($user->secret_answer == $request->secret_answer)
                return view('admin.forgot.forgot-3', ['user' => $user]);
            else return redirect()->route('admin.auth.forgot-2', ['email' => $request->email])->with('error', 'Resposta errada');
        } else return redirect()->route('admin.auth.forgot')->with('error', 'Email incorreto');
    }

    public function resetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($request->password == $request->password_confirm) {
                $user->update(['password' => md5($request->password)]);
                return redirect()->route('admin.auth.login')->with('success', 'Senha alterada');
            } else return redirect()->route("admin.auth.forgot-3", ['email' => $request->email, 'secret_answer' => $request->secret_answer])->with('error', 'Senhas não coincidem');
        } else return redirect()->route('admin.auth.forgot')->with('error', 'Email incorreto');
    }
}
