@extends('adminlte::page')

@section('title', 'Detalhes do usuário')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="active">Voltar</a></li>
    </ol>
    <h1>Detalhes do usuário <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $user->name }}
                </li>
                <li>
                    <strong>E-mail: </strong> {{ $user->email }}
                </li>
                <li>
                    <strong>Empresa: </strong> {{ $user->tenant->name }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"> <i class="fas fa-minus-square"></i> DELETAR O usuário {{ $user->name }}</button>
            </form>
        </div>
    </div>
@endsection
