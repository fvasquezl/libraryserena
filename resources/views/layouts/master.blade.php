<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta-title',config('app.name').'| Serena')</title>
    <meta name="description" content="@yield('meta-description','Este Blog es de Serena')">


    <!-- Styles -->
    @stack('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper" id='app'>
        <!-- Navbar -->
        @include('layouts.partials.navbar',array('title' => 'value'))
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <section class="content-header">
                @yield('content-header')
            </section>

            <!-- Main content -->
            <section class="content">
                @include('partials.show_messages')

                @yield('content')

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partials.footer')


    </div>
    <!-- ./wrapper -->
    <script src="{{ asset('js/app.js') }}"></script>

    @unless(request()->is('admin/posts/*'))
        @include('admin.posts.create')
    @endunless
    @stack('scripts')
    @stack('modals')

</body>

</html>
