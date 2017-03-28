@extends('admin.template.main')

@section('title', 'Crear Tag')
@section('content')
 {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}

        <div class="form-group">
            {!!Form::label('name', 'Nombre')!!}
            {!!Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required'])!!}
        </div>      

         <div class="form-group">
            {!!Form::submit('Registrar', ['btn btn-primary'])!!}
        </div>


    {!! Form::close() !!}
@endsection