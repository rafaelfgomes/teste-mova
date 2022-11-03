<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <h1>
            Mensagem de {{ $data['week_day'] }}
        </h1>
        <h3>
            {{ $data['message'] }}
        </h3>
    </body>

</html>
