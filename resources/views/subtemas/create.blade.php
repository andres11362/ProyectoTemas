@extends('layout.user')

@section('content')
    @include('alerts.request')
    <div class="page-header">
        <h1>Crear nuevo subtema</h1>
    </div>
    {!! Form::open(['route' => 'subtemas.store', 'method' => 'post', 'files' => true, 'id' => 'create-form']) !!}
        @include('subtemas.form.subt')
        {!! Form::submit('Registrar', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
    <br>
    <br>
@endsection