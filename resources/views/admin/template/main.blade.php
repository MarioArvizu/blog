<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Default'), | Panel de Administración</title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/chosen/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('css/general.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/trumbowyg/ui/trumbowyg.min.css') }}">
</head>
<body>
    @include('admin.template.partials.nav')

    <section class="section-admin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">@yield('title')</h3>
        </div>
    </div>

    <div class="panel-body">
    <div class="container col-lg-12"> <br>
        @include('flash::message')
        @include('admin.template.partials.errors')
        @yield('content')
        <br>
    </div> 
    </div>
  
    </section>

    <script src="{{ asset('plugins/jquery/js/jquery-3.1.1.js') }}"> </script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js')   }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"> </script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.js')    }}"></script>
    @yield('js')
</body>
</html>