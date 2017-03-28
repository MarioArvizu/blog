@extends('admin.template.main')
@section('title', 'Crear Articulo')
@section('content')

{!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => true]) !!}

    <div class="formgroup">
    {!! Form::label('title', 'Titulo')!!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titulo del articulo', 'required'])!!}
    </div><br>

    <div class="formgroup">
    {!! Form::label('category_id', 'Categoria')!!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una Opción', 'required']) !!}
    </div>

    <div class="formgroup">
    {!! Form::label('content', 'Contenido') !!}
    {!! Form::textarea('content',null, ['class' => 'form-control textarea-content']) !!}
    </div>

    <div class="formgroup">
    {!! Form::label('tag_id', 'Tag')!!}
    {!! Form::select('tags[]', $tags, null, ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
    </div>

    <div class="formgroup">
    {!! Form::label('image', 'Imagen') !!}
    {!! Form::file('image') !!}
    
    </div>
    <div class="formgroup">
    {!! Form::submit('Agregar Articulo', ['class' => 'btn btn-primary'] ) !!}
    </div>

{!! Form::close() !!}

@endsection

@section('js')

<script>
$(".select-tag").chosen({
placeholder_text_multiple: 'Seleccione un maximo de 3 tags',
max_selected_options: 3,
search_contains: true,
no_results_text: 'No se encontraron estos tags'
});

$(".select-tag").chosen({
    placeholder_text_single: 'Seleccione una categoría..'
});

$('.textarea-content').trumbowyg();
</script>

@endsection