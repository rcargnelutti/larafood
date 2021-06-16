@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="active">Voltar</a></li>
    </ol>
    <h1>Cadastrar Novo Produto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
@endsection
