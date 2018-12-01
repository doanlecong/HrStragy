@extends('layouts.app')

@section('scriptTop')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
          integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/glide-core.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glide-theme.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <style>
        #welcome_image {
            width: 70%;
        }
        @media only screen and (max-width: 420px) {
            #welcome_image {
                width: 100%;
                height: 110%;
            }
        }
    </style>
@endsection

@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container-fluid parallax-window">
        <div class="row">
            <div class="col no-padding-left-right text-center">
                <img src="{{ asset('images/caytrithuc_1.png') }}" alt="image" id="welcome_image">
                {{--<div class="glide">--}}
                    {{--<div class="glide__track" data-glide-el="track">--}}
                        {{--<ul class="glide__slides ">--}}

                            {{--<li class="glide__slide">--}}
                                {{--<div class="row first" style="height: 93vh;background-image: url('{{ asset(config('global.image_slider_1')) }}');--}}
                                        {{--background-size: cover;--}}
                                        {{--background-position: center center;">--}}
                                    {{--<div class="col-sm-8 padding-around d-flex flex-row  align-items-end" >--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-4 pt-6 background-tranparent-100 d-flex justify-content-center align-items-center no-padding-left-right hide-scrollbar" style="overflow-y: scroll;">--}}
                                        {{--<div>--}}
                                            {{--@foreach($ourservices as $key => $service)--}}
                                                {{--<div class="p-3 no-margin-bottom ">--}}
                                                    {{--<a style="text-decoration: underline" class="green-text" href="{{ route('view_service', $service->slug.".html") }}"><h3 class="green-text font-italic">{{ strip_tags($service->title)  }}</h3></a>--}}
                                                {{--</div>--}}
                                            {{--@endforeach--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="glide__slide">--}}
                                {{--<div class="row second" style="height: 93vh; background: url('{{ asset(config('global.image_slider_2')) }}'); background-size: cover; background-position: center center;">--}}
                                    {{--<div class="col-sm-8 padding-around d-flex flex-row  align-items-end" >--}}

                                    {{--</div>--}}
                                    {{--<div class="col-sm-4 white-text background-tranparent-100" >--}}
                                        {{--<div class=" padding-around-20" style="position: absolute; bottom: 15%">--}}
                                            {{--<a href="{{ route('contactCandidate') }}" class="btn hover-grey green-text btn-block text-18 font-weight-light"><h3 style="overflow: hidden; text-decoration: underline; font-style: italic;">Send Your Profile</h3></a>--}}

                                            {{--<a href="{{ route('jobsearch') }}" class="btn hover-grey green-text btn-block text-18 font-weight-light"><h3 style="overflow: hidden; text-decoration: underline; font-style: italic;">Find Your Job</h3></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="glide__slide">--}}
                                {{--<div class="row third"  style="height: 93vh; background: url('{{ asset(config('global.image_slider_3')) }}'); background-size: cover; background-position: center center;">--}}
                                    {{--<div class="col-sm-8 padding-around background-tranparent-100  d-flex flex-row  align-items-end" >--}}

                                    {{--</div>--}}
                                    {{--<div class="col-sm-4 pt-4 white-text">--}}
                                        {{--<div style="padding-top: 46%">--}}
                                            {{--<a href="{{ route('clientservice') }}" class="btn hover-grey green-text btn-block text-183 font-weight-light"><h3 style="overflow: hidden; text-decoration: underline; font-style: italic;">Client Services</h3></a>--}}
                                            {{--<a href="{{ route('customerStory') }}" class="btn hover-grey green-text btn-block text-183 font-weight-light"><h3 style="overflow: hidden; text-decoration: underline; font-style: italic;">Short Story</h3></a>--}}
                                            {{--<a href="{{ route('viewCompanyProfile') }}" class="btn hover-grey green-text btn-block text-183 font-weight-light"><h3 style="overflow: hidden; text-decoration: underline; font-style: italic;">Company Profile</h3></a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="glide__arrows" data-glide-el="controls">--}}
                    {{--<button class="glide__arrow glide__arrow--left background-tranparent rounded-circle" data-glide-dir="<"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>--}}
                    {{--<button class="glide__arrow glide__arrow--right background-tranparent rounded-circle" data-glide-dir=">"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>--}}
                    {{--</div>--}}
                    {{--<div data-glide-el="controls[nav]" class="glide__bullets">--}}
                        {{--<button data-glide-dir="=0" class="glide__bullet border-around-green box-shadown-light-dark" style="width: 20px;height: 20px;"></button>--}}
                        {{--<button data-glide-dir="=1" class="glide__bullet border-around-green box-shadown-light-dark" style="width: 20px;height: 20px;"></button>--}}
                        {{--<button data-glide-dir="=2" class="glide__bullet border-around-green box-shadown-light-dark" style="width: 20px;height: 20px;"></button>--}}
                    {{--</div>--}}

                {{--</div>--}}
            </div>
        </div>
        <div style="background-color: white">
            <div>
                <h1 class="text-center pt-5 pb-5 green-text text-uppercase font-playfair text-shadown-black pt-5">
                    <a class="green-text text-shadown-black" style="text-decoration: none;"
                       href="{{ route('jobsearch') }}">New Jobs</a></h1>
                <div class="container background-tranparent-100 rounded">
                    <div class="row job-home">
                        <div class="col-12 table-responsive background-tranparent-100 rounded">
                            <table class="table table-hover table-striped" style="color: #1c7430">
                                <thead>
                                    <th><h5>Job Title</h5></th>
                                    <th><h5>Salary</h5></th>
                                    <th><h5>Location</h5></th>
                                    <th><h5>Date Posted</h5></th>
                                </thead>
                                <tbody>
                                    @if(count($jobs) > 0)
                                        @foreach($jobs as $job)
                                            <tr>
                                                <td>
                                                    <a class="animate-bottom-nocontent green-text font-roboto-light"
                                                       href="{{ route('jobsearch.viewJob', $job->slug.".html") }}">{{ ucfirst($job->job_name) }}</a>
                                                </td>
                                                <td>
                                                    {{ $job->salary }}
                                                </td>
                                                <td class="font-roboto-light">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $job->jobDistrict!= null ? $job->jobDistrict->name : "" }} {{ $job->province !=null ? $job->province->name : ""}} {{ $job->country != null ? $job->country->name : ""}}
                                                </td>
                                                <td>
                                                    {{ date('d/m/Y', strtotime($job->created_at)) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4">
                                                <i class="fa fa-cube fa-2x"></i> We will find new jobs for you
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 mt-2">
                            <h5 class="text-right">
                                <a href="{{ route('jobsearch') }}" class="pl-3 pr-3 btn-round box-shadown-light-dark white-text text-20 btn background-green"
                                >View More</a>
                            </h5>
                        </div>

                    </div>
                    <div class="row pb-5 d-sm-block d-md-none">
                        @if(count($jobs) > 0)
                            @foreach($jobs as $job)
                                <div class="col-sm-6" style="background-color: whitesmoke">
                                    <div class="row mt-2 ml-2 mr-2  border-left-green-m background-white box-shadown-light-dark mb-3">
                                        {{--<div class="col-sm-4 no-padding-left" style="overflow: hidden;">--}}
                                            {{--@if($job->image != null && $job->image != "NULL" )--}}
                                                {{--<img src="{{ $job->image }}" alt="{{ $job->job_name }}"--}}
                                                     {{--class=" image-full-width scale-onetwo image-full-height" style="height: 150px; object-fit: cover;" title="{{ $job->job_name }}">--}}
                                            {{--@else--}}
                                                {{--<img src="{{ asset('upload/images/blankimage.jpg') }}"--}}
                                                     {{--class=" image-full-width" title="{{ $job->job_name }}">--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        <div class="col hover-grey">
                                            <h5 class="font-roboto font-weight-bold blue-text mt-3">
                                                <a class=" animate-bottom-nocontent green-text"
                                                   href="{{ route('jobsearch.viewJob', $job->slug.".html") }}">{{ ucfirst($job->job_name) }}</a>
                                            </h5>
                                            <small>Industry : <span class="badge bg-info white-text shadow-sm" style="font-size: 0.7rem;">{{ @$job->jobType->abbr ?? '' }}</span>
                                                @if(!empty($job->jobCates) && count($job->jobCates) > 0)
                                                    @foreach($job->jobCates as $cate)
                                                        <span class="badge bg-info white-text shadow-sm" style="font-size: 0.7rem;">{{ $cate->name }}</span>
                                                    @endforeach
                                                @endif
                                            </small>
                                            <p class="font-roboto green-text font-roboto-light text-11">
                                                {{ mb_substr(strip_tags($job->description), 0, 100) }}{{ strlen(strip_tags($job->description)) > 100 ? "...":"" }}
                                            </p>
                                            <h6 class="orange-text">Salary : {{ $job->salary }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h3 class="green-text font-roboto-light"><i class="fa fa-cube"></i> Sorry ! The Job You Are Looking For Is Not Available</h3>
                            </div>

                        @endif
                        <div class="row mt-3">
                            <div class="col">
                                <h5 class="text-right">
                                    <a href="{{ route('jobsearch') }}" class="pl-3 pr-3 btn-round box-shadown-light-dark white-text text-20 btn hover-dark background-green"
                                    >View More</a>
                                </h5>
                            </div>
                        </div>

                    </div>
                </div>
                </div>

            </div>
        </div>

        {{--<div class="parallax-window " data-parallax="scroll" style="padding-bottom: 5rem;" data-image-src="{{asset('images/background_1.png')}}">--}}
            {{--<div >--}}
                {{--<h1 class="text-center  pt-5 pb-5 text-uppercase font-playfair text-shadown-orange-thin"><a class="white-text" style="text-decoration: none; font-size: 3rem"--}}
                            {{--href="{{ route('ourcooperate') }}">Our Cooperates</a></h1>--}}
                    {{--<div class="row mb-5">--}}
                    {{--<div class="col">--}}
                        {{--<div class="cooperate">--}}
                            {{--<div class="glide__track" data-glide-el="track">--}}
                                {{--<ul class="glide__slides">--}}
                                    {{--@foreach($ourCoops as $coop)--}}
                                        {{--<li class="glide__slide">--}}
                                            {{--<div class="card w-100 shadow-lg mb-3 card-rotate box-shadown-light-dark" style="overflow: hidden; min-height: 430px; max-height: 430px; background-color: rgba(0,200,151,0.59)">--}}
                                                {{--<div class="front">--}}
                                                    {{--<img class="background-white image-full-width scale-onetwo" style="object-fit: cover; max-height: 200px;" src="{{ $coop->image_small }}" alt="Card image">--}}
                                                    {{--<div class="card-body white-text position-absolute" style="bottom: 30px">--}}
                                                        {{--<h4 class="card-title text-center">{{ $coop->title }}</h4>--}}
                                                        {{--<p class="card-text text-justify">{{ mb_substr(strip_tags($coop->descript),0, 100)}}{{ strlen(strip_tags($coop->descript)) > 100 ? "..." : "" }}</p>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<div class="back border-around-dash-green-m background-gradient-cyan-plum">--}}
                                                    {{--<div class="card-body ">--}}
                                                        {{--<h5 class="text-center font-playfair text-20 white-text">--}}
                                                            {{--More Detail--}}
                                                        {{--</h5>--}}
                                                        {{--<p class="text-justify text-18 font-weight-bold white-text">--}}
                                                            {{--{{ mb_substr(strip_tags($coop->descript),0, 300)}}{{ strlen(strip_tags($coop->descript)) > 300 ? "..." : "" }}--}}
                                                        {{--</p>--}}
                                                        {{--<div class="text-center ">--}}
                                                            {{--<a href="{{ $coop->link }}" class="btn btn-green btn-round white-text box-shadown-light-dark ">Go to Partner's Page</a>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                            {{--<div class="glide__arrows" data-glide-el="controls">--}}
                                {{--<button class="glide__arrow glide__arrow--left background-tranparent rounded-circle" data-glide-dir="<"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>--}}
                                {{--<button class="glide__arrow glide__arrow--right background-tranparent rounded-circle" data-glide-dir=">"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection

@section('addScript')
    {{--<script src="{{ asset('js/parallax.min.js') }}"></script>--}}
    {{--<script src="{{ asset('js/glide.min.js') }}"></script>--}}

    {{--<script>--}}
        {{--let glide = new Glide('.glide', {--}}
            {{--type: 'carousel',--}}
            {{--startAt: 0,--}}
            {{--perView: 1,--}}
            {{--autoplay : false,--}}
            {{--hoverpause: true,--}}
            {{--animationDuration: 2000,--}}
            {{--animationTimingFunc: "ease-in-out",--}}
        {{--});--}}
        {{--glide.mount();--}}

    {{--</script>--}}
@endsection