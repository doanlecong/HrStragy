<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('icon/icon.ico') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome Administrator | DOAN LE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield("script")
</head>
<body>
    <div class="container-fluid container_admin" >
        <div class="side-menu topic_yellow" id="side-menu">
            @include('layouts.side_menu_admin')
        </div>
        <div class="main-content" id="main-content">
            @include('layouts.top_menu_admin')
            @yield('breadcrumb')
            <main class="py-4">
                @include('layouts.content_admin')
            </main>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/side-menu.js') }}"></script>
    <script src="{{ asset('js/accordion.js') }}"></script>
    @yield('scriptTail')
</body>
</html>
