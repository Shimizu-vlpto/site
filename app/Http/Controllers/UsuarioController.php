<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    // Exibe o formulário de registro de usuário
    public function showRegisterForm()
    {
        return view('usuarios.registrar');
    }

    // Registrar um novo usuário
    public function registrar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:users',
            'senha' => 'required|string|min:8',
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'username' => $request->username,
            'senha_hash' => Hash::make($request->senha),
        ]);

        return redirect()->route('usuarios.login')->with('success', 'Usuário registrado com sucesso!');
    }

    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('usuarios.login');
    }

    // Realiza o login do usuário
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'senha' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['senha']])) {
            return redirect()->route('produtos.index')->with('success', 'Login bem-sucedido!');
        } else {
            return back()->withErrors(['username' => 'Credenciais inválidas'])->withInput();
        }
    }
}
