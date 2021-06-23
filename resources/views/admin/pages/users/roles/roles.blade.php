@extends('adminlte::page')

@section('title', 'Cargos do Usuário {$role->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="active">Usuários</a></li>
    </ol>
    <h1>Cargos do Usuário <strong> {{ $user->name }} </strong></h1>
    <a href="{{ route('users.roles.available', $user->id ) }}" class="btn btn-dark"> <i class="fas fa-plus-square"></i> ADD NOVO CARGO</a>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th style="width:50px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td style="width:250px;">
                            <a href="{{ route('users.role.detach', [$user->id, $role->id]) }}" class="btn btn-danger">Desvincular</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{-- {!! $users->links() !!} --}}
            {!! $roles->appends($filters)->links() !!}
        @else
            {!! $roles->links() !!}
        @endif
    </div>
</div>
@stop
