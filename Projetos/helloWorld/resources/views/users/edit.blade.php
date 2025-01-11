@extends('layouts.app')

@section('content')
<h1>Editar Usuário</h1>
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nome:</label>
    <input type="text" name="nome" value="{{ $user->nome }}" required>
    <label>Senha:</label>
    <input type="password" name="senha">
    <button type="submit">Atualizar</button>
</form>
@endsection
