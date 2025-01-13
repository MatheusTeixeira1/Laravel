@extends('layouts.app')

@section('title', 'Lista de Produtos') <!-- Título dinâmico -->

@section('content')
<h1>Produtos</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Criar Novo Produto</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->nome }}</td>
            <td>R$ {{ number_format($product->preco, 2, ',', '.') }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
