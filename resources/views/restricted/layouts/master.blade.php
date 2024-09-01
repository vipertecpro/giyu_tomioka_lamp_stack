<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ @$pageTitle }} {{ env('APP_NAME') ? ' | ' . env('APP_NAME') : '' }}</title>
    @stack('stylesAndScripts')
</head>
<body class="dark:bg-gray-900">
@yield('content')
@stack('bodyStylesAndScripts')
</body>
</html>
