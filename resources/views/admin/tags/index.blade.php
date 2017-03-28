@extends('admin.template.main')

@section('title', 'Tags')

@section('content')

<a href="{{ route('tags.create')}}" class="btn btn-info">Registrar nuevo Tag</a> 
<!--BUSCADOR DE TAGS-->
{!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="form-group">
{!! Form::text('name',null, ['class' => 'form-control', 'placeholder' => 'Buscar Tag']) !!}
</div>
{!! Form::close() !!}
<!--FIN DEL BUSCADOR-->
<table class="table table-hover">
    <thead>
    <th>ID</th>
    <th>Nombre</th>
    <th>Acción</th>
    </thead>
        <tbody>
        @foreach($tags as $tag)
        <tr>
            <td> {{$tag->id}} </td>
            <td> {{$tag->name}} </td>
           <td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a> <a href="{{ route('admin.tags.destroy', $tag->id) }}" onclick="return confirm('¿Está seguro que desea eliminar este tag?')" class="btn btn-danger"> 
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a> </td>
        </tr>
        @endforeach
        </tbody>

</table>
{!!$tags->render() !!}

@endsection