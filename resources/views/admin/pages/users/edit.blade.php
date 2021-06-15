@extends('adminlte::page')

@section('title', "Editar o usuário - {$user->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="active">Voltar</a></li>
    </ol>
    <h1>Detalhes do usuário <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.users._partials.form')
            </form>
        </div>
    </div>
@endsection
