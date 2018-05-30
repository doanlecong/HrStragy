<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6c0fdd">
    <meta name="author" content="Doan Le">
    <meta name="description" content="Blog , Programming, PHP, Java, .Net,Ruby">
    <!-- For Metadata -->
    @yield('metadata')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favico.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favico.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>
        @yield('title')
    </title>
    @yield('scriptTop')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="fb-root"></div>
<div id="fb-root"></div>
<script async>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<nav class="navbar navbar-expand-md navbar-primary navbar-laravel navbar-top">
    <div class="container text-center">
        <div class="collapse navbar-collapse" id="navbarSupportedContentHidden">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li><a class="nav-link" href="{{ route('homepage') }}">HOME</a></li>
                <li><a class="nav-link" href="{{ route('aboutus') }}">ABOUT US</a></li>
                <li><a class="nav-link" href="{{ route('jobsearch') }}">JOB SEARCH</a></li>
                <li><a class="nav-link" href="{{ route('ourservice') }}">OUR SERVICES</a></li>
                <li><a class="nav-link" href="{{ route('clientservice') }}">CLIENT SERVICES</a></li>
                <li><a class="nav-link" href="{{ route('ourcooperate') }}">OUR COOPERATE</a></li>
                <li><a class="nav-link" href="{{ route('contact') }}">CONTACT US</a></li>
            </ul>

            @if(Auth::check())
                <ul class="navbar-nav ml-auto">
                    <a class="nav-link ml-auto btn btn-outline-primary" href="{{ route('admin') }}">Admin Page</a>
                    <a class="nav-link ml-auto btn btn-outline-primary" href="{{ route('logout') }}">Logout</a>
                </ul>
                @else
                <a class="nav-link ml-auto" href="/login">Login</a>
            @endif

        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-md navbar-primary navbar-laravel navbar-under-top sticky-top border-top-green-m" id="navbar-under-top">
    <div class="container no-padding-left-right">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid logo-full-size" src="{{ asset('images/logos.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php
            $isHome = false;
            $isAbout = false;
            $isJobSearch = false;
            $isOurService = false;
            $isClientService = false;
            $isCooperate = false;
            $isContact = false;
            $path = request()->path();
            $arrayPath = explode('/',$path);
            if(count($arrayPath) == 1) {
                $currentTopic = explode('.',$arrayPath[0])[0];
            } else {
                $currentTopic = explode('/',$path)[0];
            }
            switch ($currentTopic) {
                case "":
                    $isHome = true;
                    break;
                case "about-us":
                    $isAbout = true;
                    break;
                case "job-search":
                    $isJobSearch = true;
                    break;
                case "our-service":
                    $isOurService = true;
                    break;
                case "client-service":
                    $isClientService = true;
                    break;
                case "our-cooperate":
                    $isCooperate = true;
                    break;
                case "contact":
                    $isContact = true;
                    break;
            }
            ?>
            <ul class="navbar-nav ml-auto ul-list">
                <li class="nav-item "><a class="nav-link {{ $isHome ? "selected" : ""}} " href="{{ route('homepage') }}">HOME</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link {{ $isAbout ? "selected" : ""}} dropdown-toggle" href="{{ route('aboutus') }} " id="aboutUsDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ABOUT US</a>
                    <div class="dropdown-menu" aria-labelledby="aboutUsDropdownMenu">
                        <a class="dropdown-item" href="{{ route('aboutus') }}" >Abour Us</a>
                        <a class="dropdown-item" href="#" >Our Staffs</a>
                        <a class="dropdown-item" href="#" >Company Profile</a>
                        <a class="dropdown-item" href="#" >Internal Recruitment Noted</a>
                    </div>
                </li>
                <li class="nav-item "><a class="nav-link {{ $isJobSearch ? "selected" : ""}}" href="{{ route('jobsearch') }}" >JOB SEARCH</a></li>
                <li class="nav-item dropdown ">
                    <a class="nav-link {{ $isOurService ? "selected" : ""}} dropdown-toggle" href="{{ route('ourservice') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">OUR SERVICES</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('ourservice') }}">Our Services</a>
                        <a class="dropdown-item" href="#" >Human Training</a>
                        <a class="dropdown-item" href="#" >Outsourcing & Staffing</a>
                        <a class="dropdown-item" href="#" >Student Training Services</a>
                        <a class="dropdown-item" href="#" >High School Training Services</a>
                    </div>
                </li>
                {{--<li class="nav-item "><a class="nav-link {{ $isClientService ? "selected" : ""}}" href="{{ route('clientservice') }}" style="text-transform: uppercase">CLIENT SERVICES</a></li>--}}
                <li class="nav-item "><a class="nav-link {{ $isCooperate ? "selected" : ""}}" href="{{ route('ourcooperate') }}" style="text-transform: uppercase">OUR COOPERATE</a></li>
                <li class="nav-item "><a class="nav-link {{ $isContact ? "selected" : ""}}" href="{{ route('contact') }}" style="text-transform: uppercase">CONTACT US</a></li>
            </ul>
        </div>
    </div>
</nav>
@yield('superlink')
<div class="container" id="breadcrumb">
    @yield('breadcrumb')
</div>
<main class="py-4">
    @yield('content')
</main>
<div class="container-fluid background-tranparent border-top-green-m ">
    @include('layouts.footer');
</div>
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
@yield('addScript')
</body>
</html>
