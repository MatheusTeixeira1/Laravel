<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Listar todos os produtos
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Exibir formulário para criar um novo produto
    public function create()
    {
        return view('products.create');
    }

    // Salvar um novo produto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    // Exibir os detalhes de um produto
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Exibir formulário para editar um produto
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // Atualizar os dados de um produto
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Excluir um produto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
