@extends('site.layout')
@section('nomePagina', 'Detalhes')

@section('conteudo')
<div class="row container">
    <div class="col s12 m6">
        <img src="{{ $produto->imagem }}" class="responsive-img">
    </div>
    <div class="col s12 m6">
        <h1>{{$produto->nome}}</h1>
        <p>{{$produto->descricao}}</p>
        <p>Postado por: {{$produto->user->name}}</p> 
        <p>Categoria: {{$produto->categoria->nome}}</p>
        {{-- 
        --}}
        <h4>R$: {{number_format($produto->preco,2,',','.')}}</h4>
        <button class="btn orange btn-large">Comprar</button>
    </div>
</div>
@endsection