@extends('admin.template.main')
@section('title','Editar Articulo'.$article->title)
@section('content')

{!! Form::model($article, ['route' => ['articles.update', $article], 'method' => 'PUT'])!!}

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
    {!! Form::select('tags[]', $tags, $my_tags, ['class' => 'form-control select-tag', 'multiple', 'required']) !!}
    </div>

    <div class="form-group">
    {!! Form::submit('Editar cambio', ['class' => 'btn btn-primary']) !!}
    </div>
    {!!  Form::close() !!}


{!! Form::close()!!}

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