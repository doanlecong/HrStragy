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
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-105327923-1', 'auto');
        ga('send', 'pageview');
        window.onload = function () {
            ga(function (tracker) {
                console.log(tracker);
            });
        }
    </script>
    <title>
        @yield('title')
    </title>
    @yield('scriptTop')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div id="fb-root"></div>
@if(auth()->check())
    <nav class="navbar navbar-expand-md navbar-primary navbar-laravel navbar-under-top sticky-top border-top-green-m  bg-info">
        <div class="container">
            <ul class="navbar-nav ml-auto ul-list">
                <li class="nav-item">
                    <a class="nav-link white-text btn btn-green" href="{{ route('home') }}">Admin"s Page</a>
                </li>
            </ul>
        </div>
    </nav>
@endif

<nav class="navbar navbar-expand-md navbar-primary navbar-laravel navbar-under-top sticky-top" id="navbar-under-top">
    <div class="container no-padding-left-right">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="img-fluid logo-full-size" src="{{ asset('images/Logo.png')}}">
        </a>
        {{--<a href="{{ url('/') }}" class="navbar-brand ml-0 job-home">--}}
            {{--<h3 class="green-text">HRStrategy</h3>--}}
        {{--</a>--}}
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
                case "about":
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
                case "customer-story":
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
                <li class="nav-item {{ $isHome ? "selected" : ""}}"><a class="nav-link" href="{{ route('homepage') }}">HOME</a></li>
                <li class="nav-item dropdown {{ $isAbout ? "selected" : ""}}">
                    <a class="nav-link dropdown-toggle" href="{{ route('aboutus') }} ">ABOUT</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('aboutus') }} ">ABOUT US</a>
                        <a class="dropdown-item" href="{{ route('ourStaff') }} ">OUR STAFFS</a>
                        <a class="dropdown-item" href="{{ route('companyProfile') }} ">COMPANY PROFILE</a>
                        <a class="dropdown-item" href="{{ route('internalRecruitment') }} ">INTERNAL RECRUITMENT</a>
                    </div>
                </li>
                <li class="nav-item {{ $isJobSearch ? "selected" : ""}}"><a class="nav-link " href="{{ route('jobsearch') }}" >JOB SEARCH</a></li>
                <li class="nav-item dropdown {{ $isOurService ? "selected" : ""}}">
                    <a class="nav-link dropdown-toggle" href="{{ route('ourservice') }}">OUR SERVICES</a>
                    @if(!empty($ourservices))
                        <div class="dropdown-menu">
                            @foreach($ourservices as $service)
                                <a class="dropdown-item" href="{{ route('view_service', $service->slug.".html") }}">{{ mb_substr($service->title, 0 ,30) }}{{ strlen($service->title) > 30 ? "...":"" }}</a>
                            @endforeach
                        </div>
                    @endif
                </li>
                <li class="nav-item dropdown {{ $isClientService ? "selected" : ""}}">
                    <a class="nav-link dropdown-toggle" href="#">Client Services</a>
                    @if(!empty($clientServices))
                        <div class="dropdown-menu">
                            @foreach($clientServices as $service)
                                <a class="dropdown-item" href="{{ route('view_type_client_service',$service->slug.".html") }}">{{ mb_substr($service->name, 0 ,30) }}{{ strlen($service->name) > 30 ? "...":"" }}</a>
                            @endforeach
                            <a class="dropdown-item" href="{{ route('customerStory') }}">Meaning Short Story</a>
                        </div>
                    @endif
                </li >
                {{--<li class="nav-item "><a class="nav-link {{ $isClientService ? "selected" : ""}}" href="{{ route('clientservice') }}" style="text-transform: uppercase">CLIENT SERVICES</a></li>--}}
                <li class="nav-item {{ $isCooperate ? "selected" : ""}}"><a class="nav-link " href="{{ route('ourcooperate') }}" style="text-transform: uppercase">OUR COOPERATE</a></li>
                <li class="nav-item dropdown {{ $isContact ? "selected" : ""}}">
                    <a class="nav-link dropdown-toggle" href="#" style="text-transform: uppercase" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CONTACT US</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('contactCandidate') }}">Contact For Candidate</a>
                        <a class="dropdown-item" href="{{ route('contactGuest') }}" >Contact For Guest</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('superlink')
<div class="container-fluid" id="breadcrumb">
    @yield('breadcrumb')
</div>
<main class="py-4">
    @yield('content')
</main>
@if(!empty($info))
    <div class="container-fluid background-white border-top-green-m no-padding-left-right">
        @include('layouts.footer')
    </div>
@endif
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function(){
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 1000, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>
@yield('addScript')
</body>
</html>
