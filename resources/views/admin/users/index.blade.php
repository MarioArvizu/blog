@extends('admin.template.main')

@section('title', 'Lista de Usuarios')

@section('content')

<a href="{{ route('users.create')}}" class="btn btn-info">Registrar nuevo Usuario</a> <hr>

<table class="table table-hover">
    <thead>
    <th>ID</th>
    <th>Nombre</th>
    <th>Correo Electronico</th>
    <th>Tipo</th>
    <th>Acción</th>
    </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td> {{$user->id}} </td>
            <td> {{$user->name}} </td>
            <td> {{$user->email}} </td>
            <td> 
            @if($user->type == "admin")
            <span class="label label-primary">{{$user->type}}</span>
            @else
            <span class="label label-success">{{$user->type}}</span>
            @endif
            </td>
            <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a> <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Está seguro que desea eliminar este usuario?')" class="btn btn-danger"> 
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a> </td>
        </tr>
        @endforeach
        </tbody>

</table>
{!!$users->render() !!}
@endsection