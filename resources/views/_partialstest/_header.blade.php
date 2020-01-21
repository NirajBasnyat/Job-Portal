<!doctype html>
<html lang="en">

<head>
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    {{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    @yield('select2css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta title="Code Alchemy">
    <meta name="description" content="Code Alchemy">
    <meta name="keywords" content="Code Alchemy Site">
    <link rel="shortcut icon" href="{{ asset('images/logo_ico.png') }}" type="image/x-icon" style="height: 50px;">
    <link rel="icon" href="{{ asset('images/logo_ico.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
    <title>Code Alchemy !</title>
</head>
