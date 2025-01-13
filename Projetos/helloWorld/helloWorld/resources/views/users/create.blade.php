@extends('layouts.app')

@section('content')
<h1>Criar Novo Usuário</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <label>Senha:</label>
    <input type="password" name="senha" required>
    <button type="submit">Salvar</button>
</form>
@endsection
