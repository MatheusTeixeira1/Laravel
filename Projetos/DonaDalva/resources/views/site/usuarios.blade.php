@extends('site.layout')

@section('nomePagina', 'Listagem de Usuários')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col s12">
            <h4 class="center-align">Lista de Usuários</h4>
            
            <!-- Botão de Adicionar Novo -->
            <div class="fixed-action-btn">
                <a href="" class="btn-floating btn-large waves-effect waves-light blue">
                    <i class="material-icons">add</i>
                </a>
            </div>

            <!-- Tabela de Usuários -->
            <div class="card">
                <div class="card-content">
                    <table class="highlight responsive-table">
                        <thead>
                            <tr>
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Nível</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td>
                                    @if($usuario->imagem)
                                    <img src="{{ $usuario->imagem }}" alt="{{ $usuario->name }}" class="circle responsive-img" width="50" height="50">
                                    @else
                                    <img src="" alt="Usuário sem foto" class="circle responsive-img" width="50" height="50">
                                    @endif
                                </td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    @switch($usuario->nivelUsuario)
                                        @case('adm')
                                            <span class="new badge blue" data-badge-caption="Admin"></span>
                                            @break
                                        @case('cliente')
                                            <span class="new badge green" data-badge-caption="Cliente"></span>
                                            @break
                                        @case('motoboy')
                                            <span class="new badge orange" data-badge-caption="Motoboy"></span>
                                            @break
                                        @case('cozinheira')
                                            <span class="new badge purple" data-badge-caption="Cozinheira"></span>
                                            @break
                                    @endswitch
                                </td>
                                <td>
                                    <a href=" {{ route('usuarios.show', $usuario->id) }}" class="btn-small waves-effect waves-light blue tooltipped" data-position="top" data-tooltip="Detalhes">
                                        <i class="material-icons">visibility</i>
                                    </a>
                                    <form action=" route('usuarios.destroy', $usuario->id) " method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-small waves-effect waves-light red tooltipped" data-position="top" data-tooltip="Excluir" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Paginação -->
            <div class="center-align">
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    .responsive-table {
        width: 100%;
        overflow-x: auto;
    }
    
    .badge {
        margin: 0;
    }
    
    .btn-small {
        padding: 0 8px;
        margin: 0 5px;
    }
    
    .fixed-action-btn {
        position: fixed;
        right: 35px;
        bottom: 35px;
    }
    
    @media only screen and (max-width: 600px) {
        .fixed-action-btn {
            right: 20px;
            bottom: 20px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializa tooltips
        var tooltips = document.querySelectorAll('.tooltipped');
        M.Tooltip.init(tooltips);
    });
</script>
@endsection