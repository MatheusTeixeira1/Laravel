@extends('layouts.app')

@section('content')
<h1>Editar Produto</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nome:</label>
    <input type="text" name="nome" value="{{ $product->nome }}" required>
    <label>Preço:</label>
    <input type="number" step="0.01" name="preco" value="{{ $product->preco }}" required>
    <button type="submit">Atualizar</button>
</form>
@endsection