<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function auth(Request $request)
{
    $credenciais = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ], [
        'email.required' => 'O campo email é obrigatório',
        'email.email' => 'O campo email é inválido',
        'password.required' => 'O campo senha é obrigatório',
    ]);

    if(Auth::attempt($credenciais)) {
        $request->session()->regenerate();
        return redirect()->intended('/home'); 
    }

    return redirect()->back()
        ->withInput($request->only('email'))
        ->with('erro', 'Senha ou usuário inválido.');
}
public function register(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', 'min:6'],
    ], [
        'name.required' => 'O campo nome é obrigatório',
        'email.required' => 'O campo email é obrigatório',
        'email.email' => 'O email é inválido',
        'email.unique' => 'Este email já está em uso',
        'password.required' => 'O campo senha é obrigatório',
        'password.confirmed' => 'As senhas não coincidem',
        'password.min' => 'A senha deve ter no mínimo 6 caracteres',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user); // já loga o usuário depois de registrar

    Auth::login($user);

    // Envia e-mail de verificação
    $user->sendEmailVerificationNotification();

    return redirect()->route('verification.notice');

    }
}