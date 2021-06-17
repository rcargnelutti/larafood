@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="active">Voltar</a></li>
    </ol>
    <h1>Detalhes do Produto <b>{{ $product->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 90px;">
                </li>
                <li>
                    <strong>Título: </strong> {{ $product->title }}
                </li>
                <li>
                    <strong>Flag: </strong> {{ $product->flag }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $product->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"> <i class="fas fa-minus-square"></i> DELETAR O PRODUTO {{ $product->title }}</button>
            </form>
        </div>
    </div>
@endsection
