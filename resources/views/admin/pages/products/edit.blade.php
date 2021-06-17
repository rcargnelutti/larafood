@extends('adminlte::page')

@section('title', "Editar o Produto - {$product->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="active">Voltar</a></li>
    </ol>
    <h1>Detalhes do Produto<b>{{ $product->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
@endsection
