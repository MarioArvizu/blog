@extends('admin.template.main')

@section('title', 'Categorías')

@section('content')

<a href="{{ route('categories.create')}}" class="btn btn-info">Registrar nueva Categoría</a> <hr>

<table class="table table-hover">
    <thead>
    <th>ID</th>
    <th>Nombre</th>
    <th>Acción</th>
    </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td> {{$category->id}} </td>
            <td> {{$category->name}} </td>
           <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a> <a href="{{ route('admin.categories.destroy', $category->id) }}" onclick="return confirm('¿Está seguro que desea eliminar esta categoría?')" class="btn btn-danger"> 
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a> </td>
        </tr>
        @endforeach
        </tbody>

</table>
{!!$categories->render() !!}

@endsection