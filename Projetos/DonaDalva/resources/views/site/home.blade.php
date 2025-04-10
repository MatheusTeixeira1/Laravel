@extends('site.layout')

@section('nomePagina', 'Home - Sistema')

@section('conteudo')
<div class="container">
    <div class="row">
        <h4 class="center-align">Bem-vindo ao Sistema</h4>
        <p class="center-align grey-text">Selecione uma das opções abaixo para gerenciar</p>

        <!-- Container principal usando CSS Grid -->
        <div class="cards-grid">
            <!-- Card Usuários -->
            <div class="card hoverable">
                <div class="card-content">
                    <div class="card-icon center">
                        <i class="material-icons large blue-text">people</i>
                    </div>
                    <span class="card-title center-align">Gestão de Usuários</span>
                    <div class="divider"></div>
                    <p class="card-description">Administre clientes, motoboys, cozinheiras e administradores do sistema</p>
                </div>
                <div class="card-action center">
                    <a href="{{ route('site.usuarios') }}" class="btn waves-effect waves-light blue">
                        Acessar <i class="material-icons right">chevron_right</i>
                    </a>
                </div>
            </div>

            <!-- Card Pedidos -->
            <div class="card hoverable">
                <div class="card-content">
                    <div class="card-icon center">
                        <i class="material-icons large orange-text">receipt</i>
                    </div>
                    <span class="card-title center-align">Controle de Pedidos</span>
                    <div class="divider"></div>
                    <p class="card-description">Acompanhe e gerencie todos os pedidos realizados pelos clientes</p>
                </div>
                <div class="card-action center">
                    {{-- <a href="{{ route('pedidos.index') }}" class="btn waves-effect waves-light orange"> --}}
                        Acessar <i class="material-icons right">chevron_right</i>
                    </a>
                </div>
            </div>

            <!-- Card Produtos -->
            <div class="card hoverable">
                <div class="card-content">
                    <div class="card-icon center">
                        <i class="material-icons large green-text">fastfood</i>
                    </div>
                    <span class="card-title center-align">Cardápio Digital</span>
                    <div class="divider"></div>
                    <p class="card-description">Gerencie os produtos disponíveis em seu estabelecimento</p>
                </div>
                <div class="card-action center">
                    {{-- <a href="{{ route('produtos.index') }}" class="btn waves-effect waves-light green"> --}}
                        Acessar <i class="material-icons right">chevron_right</i>
                    </a>
                </div>
            </div>

            <!-- Card Relatórios -->
            <div class="card hoverable">
                <div class="card-content">
                    <div class="card-icon center">
                        <i class="material-icons large purple-text">assessment</i>
                    </div>
                    <span class="card-title center-align">Analytics</span>
                    <div class="divider"></div>
                    <p class="card-description">Relatórios e indicadores de desempenho do negócio</p>
                </div>
                <div class="card-action center">
                    {{-- <a href="{{ route('relatorios.index') }}" class="btn waves-effect waves-light purple"> --}}
                        Acessar <i class="material-icons right">chevron_right</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin: 20px 0;
    }
    
    .card {
        display: flex;
        flex-direction: column;
        height: 100%; /* Fundamental para igualar as alturas */
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .card-content {
        flex: 1;
        padding: 20px;
        display: flex;
        flex-direction: column;
    }
    
    .card-icon {
        margin: 10px 0;
    }
    
    .card-title {
        font-size: 1.4rem;
        font-weight: 500;
        margin-bottom: 10px;
        text-align: center;
    }
    
    .divider {
        margin: 10px 0;
        border-bottom: 1px solid #eee;
    }
    
    .card-description {
        flex: 1;
        margin: 10px 0;
        color: #616161;
        text-align: center;
    }
    
    .card-action {
        padding: 15px;
        background: rgba(0,0,0,0.02);
        border-top: 1px solid rgba(0,0,0,0.1);
    }
    
    .btn {
        width: 100%;
    }
    
    @media only screen and (max-width: 600px) {
        .cards-grid {
            grid-template-columns: 1fr;
        }
        
        .card-title {
            font-size: 1.2rem;
        }
        
        .card-description {
            font-size: 0.9rem;
        }
    }
</style>
@endsection