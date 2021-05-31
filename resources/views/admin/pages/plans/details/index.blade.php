@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}" class="active">Detalhes</a></li>
    </ol>
    <h1>Detalhes do plano {{ $plan->name }} <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark"> <i class="fas fa-plus-square"></i> ADD</a> </h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        
        @include('admin.includes.alerts')

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th style="width:180px;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail->name }}</td>
                        <td style="width:180px;">
                            <a href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}" class="btn btn-info"> Editar</a>
                            <a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}" class="btn btn-warning"> <i class="fas fa-eye"></i> Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {{-- {!! $plans->links() !!} --}}
            {!! $details->appends($filters)->links() !!}
        @else
            {!! $details->links() !!}
        @endif
    </div>
</div>
@stop
