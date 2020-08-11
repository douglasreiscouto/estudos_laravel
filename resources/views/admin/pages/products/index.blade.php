@extends('admin.layouts.app')

@section('title', 'Recursos humanos')

@section('content')
    <h1>Exibindo os produtos</h1>
    <a href="{{route('products.create')}}">Cadastrar</a>
    <h2>Diretivas</h2>

    @component('admin.components.card')
        @slot('title')
            <h1>Titulo card</h1>
        @endslot
        Um card de exemplo
    @endcomponent
    
    <hr>
    @include('admin.includes.alerts', ['content' => 'Alerta dos preços dos novos produtos.'])
    <hr>

    @if (isset($products))
        @foreach ($products as $product)
            <p class = "@if ($loop->last) last @endif">{{$product}}</p>
        @endforeach
    @endif
    <hr>
    @forelse ($products as $product)
        <p class = "@if ($loop->first) last @endif">{{$product}}</p>
    @empty
        <p>Não existe produtos cadastrados</p>
    @endforelse
    <hr>
    @if($teste === '123')
        É igual
    @elseif($teste == 123)
        É igual a 123
    @else
        É diferente
    @endif

    @unless ($teste === '123')
        Só entra se o retorno for falso
    @else
        Outra condição
    @endunless
    
    @isset($teste2)
    <p>Entra aqui so sé a variável existir</p>
    @endisset

    @empty($teste3)
        <p>Entra se a variável estiver vazia</p>
    @endempty

    @auth
        <p>Só entra se estiver autenticado</p>
    @else 
        <p>Não Autenticado</p>
    @endauth

    @guest
        <p>Só entra se não estiver autenticado</p>
    @endguest

    @switch($teste)
        @case(1)
            Igual a 1
            @break
        @case(2)
            Igual a 2
            @break
        @default
            Default
    @endswitch
@endsection

@push('styles')
    <style>
        .last {background: #CCC;}
    </style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef'
    </script>
@endpush