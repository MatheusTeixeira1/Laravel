<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);
        return view('site.home',compact('produtos'));
    }
    
    public function detalhes($slug)
    {
        $produto = Produto::where('slug', $slug)->first();
        return view('site.detalhes',compact('produto'));
    }
    
    public function categoria($idCategoria)
    {
        $categoria = Categoria::find( $idCategoria);
        $produtos = Produto::where('id_categoria', $idCategoria)->paginate(3);
        return view('site.categoria',compact('produtos', 'categoria'));
    }
    
}
