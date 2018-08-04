<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tarefas</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        {{Html::style('css/app.css')}}

        {{Html::script('js/app.js')}}
    </head>
    <body>
        <div class="content">
            {{Html::script('js/sortable.js')}}
            @yield('content')
        </div>
    </body>
</html>
