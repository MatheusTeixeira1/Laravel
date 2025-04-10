<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SiteController extends Controller
{
    public function home()
    {
        return view('site.home');
    }
    public function usuarios()
    {
        $usuarios = User::paginate(3);
        return view('site.usuarios', compact('usuarios'));
    }
    public function show(User $usuario)
    {
        return view('site.detalhesUsuario', compact('usuario'));
    }
    
}
