@extends('adminlte::page')

@section('title', 'Detalhes da Categoria')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}" class="active">Voltar</a></li>
    </ol>
    <h1>Detalhes da categoria <b>{{ $category->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $category->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $category->description }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $category->url }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"> <i class="fas fa-minus-square"></i> DELETAR A CATEGORIA {{ $category->name }}</button>
            </form>
        </div>
    </div>
@endsection
