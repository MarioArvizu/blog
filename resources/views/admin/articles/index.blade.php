@extends('admin.template.main')
@section('title', 'Articulos')
@section('content')

<a href="{{ route('articles.create')}}" class="btn btn-info">Registrar nuevo Articulo</a> <hr>
<!--BUSCADOR DE ARTICULOS-->
{!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
<div class="form-group">
{!! Form::text('title',null, ['class' => 'form-control', 'placeholder' => 'Buscar Articulo']) !!}
</div>
{!! Form::close() !!}
<!--FIN DEL BUSCADOR-->
<table class="table table-striped">
    <thead>
        <th>ID</th>
        <th>Titulo</th>
        <th>Categoría</th>
        <th>Usuario</th>
        <th>Acción</th>
    </thead>
    <tbody>
        @foreach($articles as $article)
        <tr>
            <td> {{$article->id}} </td>
            <td> {{$article->title}} </td>
            <td> {{$article->category->name}} </td>
            <td> {{$article->user->name}} </td>
            <td><a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            </a> <a href="{{ route('admin.articles.destroy', $article->id) }}" onclick="return confirm('¿Está seguro que desea eliminar este articulo?')" class="btn btn-danger"> 
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a> </td>
        </tr>
        @endforeach

    </tbody>

</table>
{!!$articles->render() !!}
@endsection