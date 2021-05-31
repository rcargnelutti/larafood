@extends('adminlte::page')

@section('title', 'Permissões do perfil {$profile->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
    </ol>
    <h1>Permissões do perfil <strong> {{ $profile->name }} </strong></h1>
    <a href="{{ route('profiles.permissions.available', $profile->id ) }}" class="btn btn-dark"> <i class="fas fa-plus-square"></i> ADD NOVA PERMISSÂO</a>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('profiles.search') }}" method="post" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark"> <i class="fas fa-filter"></i> Filtrar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th style="width:250px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td style="width:250px;">
                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info"> Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{-- {!! $profiles->links() !!} --}}
            {!! $permissions->appends($filters)->links() !!}
        @else
            {!! $permissions->links() !!}
        @endif
    </div>
</div>
@stop
