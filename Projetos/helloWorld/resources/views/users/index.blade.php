@extends('layouts.app')

@section('content')
<h1>Lista de Usuários</h1>
<a href="{{ route('users.create') }}">Criar Novo Usuário</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->nome }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
