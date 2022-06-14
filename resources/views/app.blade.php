<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
</head>

<body>
    @if (Auth::check())
        <script>
            window.Laravel = {!! json_encode([
    'isLoggedin' => true,
    'user' => Auth::user(),
]) !!}
        </script>
    @else
        <script>
            window.Laravel = {!! json_encode([
    'isLoggedin' => false,
]) !!}
        </script>
    @endif
    <div id="app"></div>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
