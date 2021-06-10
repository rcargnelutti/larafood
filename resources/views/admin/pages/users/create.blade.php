@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="active">Voltar</a></li>
    </ol>
    <h1>Cadastrar Novo Usuário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection
