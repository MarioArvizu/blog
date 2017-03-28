@extends('admin.template.main')

@section('title', 'Editar Usuario ' .$user->name)

@section('content')

{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

  <div class="form-group">
   {!! Form::label('name', 'Nombre') !!}
   {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa tu nombre', 'required']) !!}
  </div>

  <div class="form-group">
   {!! Form::label('email', 'Correo Electronico') !!}
   {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresa tu email', 'required']) !!}
  </div>

  <div class="form-group">
   {!! Form::label('type', 'Tipo') !!}
   {!! Form::select('type', ['member' => 'Miembro', 'admin' => 'Administrador'], null, ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
   {!! Form::submit('Registrar cambio', ['class' => 'btn btn-primary']) !!}
  </div>
 {!!  Form::close() !!}


@endsection