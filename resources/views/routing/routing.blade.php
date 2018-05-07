<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div>
            action <strong>routing</strong> with method <strong>{{ Request::method() }}</strong>
            <form action="routing" method="POST">
                {{ csrf_field() }}
                <button type="submit">POST</button>
            </form>
            <form action="routing" method="POST">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <button type="submit">PUT</button>
            </form>
            <form action="routing" method="POST">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <button type="submit">PATCH</button>
            </form>
            <form action="routing" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit">DELETE</button>
            </form>
            <form action="routing" method="POST">
                {{ method_field('OPTIONS') }}
                {{ csrf_field() }}
                <button type="submit">OPTIONS</button>
            </form>
        </div>
    </body>
</html>
