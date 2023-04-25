<!DOCTYPE html>
<html lang="en">
<head>
    {{-- CSRF TOKEN --}}
    <meta name="csrf-token" content="{{ csrf_token()}}" >

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- scripts --}}
    <script src="{{asset('js/app.js')}}" defer></script>
    {{-- fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- jquery link --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Todo App</title>
</head>
<body>
    @yield('content')
</body>
</html>