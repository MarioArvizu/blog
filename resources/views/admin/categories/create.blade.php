@extends('admin.template.main')

@section('title', 'Crear Categoría')

@section('content')

    {!! Form::open(['route' => 'categories.store', 'method' => 'POST' ]) !!}
     <div class="form-group">
    {!! Form::label('name', 'Nombre')!!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Categoría', 'required']) !!}
    </div>

     <div class="form-group">
            {!!Form::submit('Registrar', ['btn btn-primary'])!!}
        </div>

    {!! Form::close()!!}

@endsection