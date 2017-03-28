@extends('admin.template.main')

@section('title', 'Editar tag ' .$tag->name)

@section('content')

{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT'])!!}

<div class="form-group">
{!! Form::label('name', 'Nombre') !!}
{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Categoría', 'required']) !!}
</div>

<div class="form-group">
{!! Form::submit('Registrar cambio', ['class' => 'btn btn-primary']) !!}
</div>
 {!!  Form::close() !!}


{!! Form::close()!!}

@endsection