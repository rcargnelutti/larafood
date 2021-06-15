@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="active">Usuários</a></li>
    </ol>
    <h1>Usuários <a href="{{ route('users.create') }}" class="btn btn-dark"> <i class="fas fa-plus-square"></i> ADD</a> </h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('users.search') }}" method="post" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Filtrar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark"> <i class="fas fa-filter"></i> Filtrar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Empresa</th>
                    <th style="width:300px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->tenant->name }}</td>
                        <td style="width:300px;">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info"> Editar</a>
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning"> <i class="fas fa-eye"></i> Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{-- {!! $users->links() !!} --}}
            {!! $users->appends($filters)->links() !!}
        @else
            {!! $users->links() !!}
        @endif
    </div>
</div>
@stop
