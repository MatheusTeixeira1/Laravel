@extends('layouts.app')

@section('content')
<h1>Criar Novo Produto</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <label>Preço:</label>
    <input type="number" step="0.01" name="preco" required>
    <button type="submit">Salvar</button>
</form>
@endsection