<!doctype html>
<html class="@yield('body-class')">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">

        @if (trim($__env->yieldContent('meta_title')))
            <title>@yield('meta_title') - screeenly</title>
        @else
            <title>screeenly - Screenshot as a Service</title>
        @endif

        <meta name="description" content="@yield('meta_description', '')" />

        <link rel="stylesheet" href="{{ elixir('assets/app.css') }}">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        @yield('styles')

        {{-- Apple Touch Icons --}}
        <link rel="apple-touch-icon" href="{{ URL::asset('assets/images/apple-touch-icon-57x57.png') }}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets/images/apple-touch-icon-76x76.png') }}" />
        <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('assets/images/apple-touch-icon-120x120.png') }}" />
        <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('assets/images/apple-touch-icon-152x152.png') }}" />

        <link rel="shortcut icon" href="/favicon.ico?v1">

    </head>
    <body class="@yield('body-class')">