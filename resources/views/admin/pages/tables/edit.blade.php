@extends('adminlte::page')

@section('title', "Editar a Mesa - {$table->identify}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('tables.index') }}" class="active">Voltar</a></li>
    </ol>
    <h1>Detalhes da Mesa <b>{{ $table->identify }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tables.update', $table->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.tables._partials.form')
            </form>
        </div>
    </div>
@endsection
