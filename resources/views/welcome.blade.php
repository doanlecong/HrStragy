@extends('layouts.app')

@section('scriptTop')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
          integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/glide-core.css') }}">
    <link rel="stylesheet" href="{{ asset('css/glide-theme.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container-fluid parallax-window " >
        <div class="parallax-window d-flex align-items-center justify-content-center " style="min-height:93vh;background-color: #0a0c0aa1" data-parallax="scroll" data-image-src="{{asset('images/Banner.jpg')}}">
            <div class="row background-litle-white padding-around box-shadown-light-dark hover-dark">
                <div class="col-sm-5 background-light-green" style="border-right: 7px solid darkcyan">
                    <h1 class="font-playfair white-text text-center text-shadown-orange-thin" style="font-size: 4rem;">HR Stategy</h1>
                </div>
                <div class="col-sm-7" >
                    <h5 class="font-lobster white-text text-center text-shadown-black" style="font-size: 1.5rem">
                        People Capability First, Profit Will Follow</h5>
                    <h5 class="font-lobster white-text text-center text-shadown-black" style="font-size: 1.3rem">Xây Dựng Năng Lực Con Người Trước, Lợi Nhuận Sẽ Theo Sau</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col no-padding-left-right">
                <div class="glide">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides ">
                            @foreach($ourservices as $key => $service)
                                <li class="glide__slide">
                                    <div class="row" style="height: 93vh;">
                                        @if($key % 2 == 0)
                                            <div class="col-sm-8 padding-around d-flex flex-row  align-items-end" style="background: url('{{ $service->image }}'); background-size: cover; background-position: center center;">
                                                <div class="background-tranparent padding-around box-shadown-light-dark hover-dark">
                                                    <h1 class="font-roboto animated slideInUp" ><a
                                                                href="{{ route('view_service','service='.encrypt($service->id)) }}" class="white-text text-shadown-black" style="text-decoration: none;">{{ $service->title }}</a></h1>
                                                    <p class="white-text font-roboto-light text-15">
                                                        {{ mb_substr(strip_tags($service->description), 0, 300) }} {{ strlen(strip_tags($service->description)) > 300 ? "...":"" }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 pt-4 white-text" style="background: url('{{ asset('images/Logo_1.png') }}'); background-size: cover;background-position: top; background-blend-mode: screen; background-color: #04c49a">
                                                <div class="background-tranparent padding-around-20 ">
                                                    <h4>{{ strip_tags($service->title)  }}</h4>
                                                    <p class="white-text font-roboto-light text-15">
                                                        {{ mb_substr(strip_tags($service->description), 0, 400) }} {{ strlen(strip_tags($service->description)) > 400 ? "...":"" }}
                                                    </p>
                                                    <a href="{{ route('view_service','service='.encrypt($service->id)) }}" class="btn btn-round text-18 white-text background-litle-white box-shadown-light-dark position-absolute" style="bottom: 40px">
                                                        More Details
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-sm-4 pt-4 white-text" style="background: url('{{ asset('images/Logo_1.png') }}'); background-size: cover;background-position: top; background-blend-mode: hard-light; background-color: green">
                                                <div class="background-tranparent padding-around-20">
                                                    <h4>{{ strip_tags($service->title)  }}</h4>
                                                    <p class="white-text font-roboto-light text-15">
                                                        {{ mb_substr(strip_tags($service->description), 0, 400) }} {{ strlen(strip_tags($service->description)) > 400 ? "...":"" }}
                                                    </p>
                                                    <a href="{{ route('view_service','service='.encrypt($service->id)) }}" class="btn btn-round text-18 white-text background-litle-white box-shadown-light-dark position-absolute" style="bottom: 40px">
                                                        More Details
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 padding-around d-flex flex-row  align-items-end hover-dark" style="background: url('{{ $service->image }}'); background-size: cover; background-position: center center;">
                                                <div class="background-tranparent padding-around box-shadown-light-dark hover-dark">
                                                    <h1 class="font-roboto  animated slideInUp " ><a
                                                                href="{{ route('view_service','service='.encrypt($service->id)) }}" class="white-text text-shadown-black" style="text-decoration: none;">{{ $service->title }}</a></h1>
                                                    <p class="white-text font-roboto-light text-15">
                                                        {{ mb_substr(strip_tags($service->description), 0, 300) }} {{ strlen(strip_tags($service->description)) > 300 ? "...":"" }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{--<div class="glide__arrows" data-glide-el="controls">--}}
                    {{--<button class="glide__arrow glide__arrow--left background-tranparent rounded-circle" data-glide-dir="<"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>--}}
                    {{--<button class="glide__arrow glide__arrow--right background-tranparent rounded-circle" data-glide-dir=">"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>--}}
                    {{--</div>--}}
                    <div data-glide-el="controls[nav]" class="glide__bullets">
                        <button data-glide-dir="=0" class="glide__bullet border-around-green box-shadown-light-dark" style="width: 20px;height: 20px;"></button>
                        <button data-glide-dir="=1" class="glide__bullet border-around-green box-shadown-light-dark" style="width: 20px;height: 20px;"></button>
                        <button data-glide-dir="=2" class="glide__bullet border-around-green box-shadown-light-dark" style="width: 20px;height: 20px;"></button>
                    </div>

                </div>
            </div>
        </div>
        <div class="parallax-window" data-parallax="scroll" data-image-src="{{asset('images/background_1.png')}}">
            <div>
                <h1 class="text-center pt-5 pb-5 green-text text-uppercase font-playfair text-shadown-black pt-5">
                    <a class="white-text" style="text-decoration: none;"
                       href="{{ route('jobsearch') }}">New Jobs</a></h1>
                <div class="container background-tranparent">
                    <div class="row pb-5">
                        @if(count($jobs) > 0)
                            @foreach($jobs as $job)
                                <div class="col-sm-6">
                                    <div class="row mt-2 ml-2 mr-2  border-left-green-m background-white box-shadown-light-dark mb-3">
                                        <div class="col-sm-4 no-padding-left" style="overflow: hidden;">
                                            @if($job->image != null && $job->image != "NULL" )
                                                <img src="{{ $job->image }}" alt="{{ $job->job_name }}"
                                                     class=" image-full-width scale-onetwo image-full-height" style="height: 150px; object-fit: cover;" title="{{ $job->job_name }}">
                                            @else
                                                <img src="{{ asset('upload/images/blankimage.jpg') }}"
                                                     class=" image-full-width" title="{{ $job->job_name }}">
                                            @endif
                                        </div>
                                        <div class="col-sm-8 hover-grey">
                                            <h5 class="font-roboto font-weight-bold blue-text mt-3">
                                                <a class=" animate-bottom-nocontent green-text"
                                                   href="{{ route('jobsearch.viewJob', $job->slug.".html") }}">{{ $job->job_name }}</a>
                                            </h5>
                                            <small>Industry : <span class="badge bg-info white-text box-shadown-light-dark" style="font-size: 0.7rem;">{{ $job->jobType->abbr }}</span>
                                                @foreach($job->jobCates as $cate)
                                                    <span class="badge bg-info white-text box-shadown-light-dark" style="font-size: 0.7rem;">{{ $cate->name }}</span>
                                                @endforeach
                                            </small>
                                            <p class="font-roboto green-text">
                                                {{ mb_substr(strip_tags($job->description), 0, 100) }}{{ strlen(strip_tags($job->description)) > 100 ? "...":"" }}
                                            </p>
                                            <h6>Salary : {{ $job->salary }}</h6>
                                            <h6>
                                                <div class="text-right">
                                                    Accepted In : <small class="green-text">{{ $job->time_from }} -- {{ $job->time_to }}</small>
                                                </div>

                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <h3 class="green-text font-roboto-light"><i class="fa fa-cube"></i> Sorry ! The Job You Are Looking For Is Not Available</h3>
                            </div>

                        @endif
                        <div class="row">
                            <div class="col">
                                <h5 class="text-right">
                                    <a href="{{ route('jobsearch') }}" class="pl-3 pr-3 btn-round box-shadown-light-dark white-text text-20 btn hover-dark background-litle-white"
                                    >View More</a>
                                </h5>
                            </div>
                        </div>

                    </div>
                </div>
                </div>

            </div>
        </div>
        <div >
            <div class="row">
                <div class="col-sm-6" style="
                        background: url('{{ asset('images/people_1.jpg') }}');
                        background-size: cover;
                        background-position: center center;
                        background-color: rgba(77, 103, 97, 0.58);
                        background-blend-mode: multiply";>
                    <div class="w-75 pt-3 pb-3 " style="min-height: 400px;margin-left: 4rem;">
                        <h1 class="pt-5 pb-5 font-roboto-light text-uppercase white-text text-shadown-black">Candidates</h1>
                        <h5 class="pb-5 white-text" style="height: 120px;text-overflow: ellipsis;">Hr Strategy specializes in finding highly talented, top-performing professionals for industry-leading companies.</h5>
                        <a href="{{ route('contactCandidate') }}" class="btn hover-dark background-litle-white white-text btn-round btn-block text-20">Send Your Resume</a>
                    </div>
                </div>
                <div class="col-sm-6" style="
                        background: url('{{ asset('images/Employers.jpg') }}');
                        background-size: cover;
                        background-position: center center;
                        background-color: rgba(77, 103, 97, 0.58);
                        background-blend-mode: multiply";>
                    <div class="w-75 pt-3 pb-3 " style="min-height: 400px; margin-left: 4rem;">
                        <h1 class="pt-5 pb-5 font-roboto-light text-uppercase white-text text-shadown-black">Employers</h1>
                        <h5 class="pb-5 white-text" style="height: 120px;text-overflow: ellipsis;">Total Talent Engagement is designed to work before, during and after the recruiting process to make talent acquisition more efficient, systematic and effective</h5>
                        <a href="{{ route('contactGuest') }}" class="btn  hover-dark background-litle-white white-text btn-round btn-block text-20">Contact US</a>
                    </div>

                </div>
            </div>

        </div>
        <div class="parallax-window " data-parallax="scroll" style="padding-bottom: 5rem;" data-image-src="{{asset('images/background_1.png')}}">
            <div >
                <h1 class="text-center text-50 pt-5 pb-5 text-uppercase font-playfair text-shadown-black"><a class="white-text" style="text-decoration: none;"
                            href="{{ route('ourcooperate') }}">Our Cooperates</a></h1>
                    <div class="row mb-5">
                    <div class="col">
                        <div class="cooperate">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    @foreach($ourCoops as $coop)
                                        <li class="glide__slide">
                                            <div class="card w-100 shadow-lg mb-3 card-rotate box-shadown-light-dark" style="overflow: hidden; min-height: 430px; max-height: 430px; background-color: rgba(0,200,151,0.59)">
                                                <div class="front">
                                                    <img class="background-white image-full-width scale-onetwo" style="object-fit: cover; max-height: 200px;" src="{{ $coop->image_small }}" alt="Card image">
                                                    <div class="card-body white-text position-absolute" style="bottom: 30px">
                                                        <h4 class="card-title text-center">{{ $coop->title }}</h4>
                                                        <p class="card-text text-justify">{{ mb_substr(strip_tags($coop->descript),0, 100)}}{{ strlen(strip_tags($coop->descript)) > 100 ? "..." : "" }}</p>
                                                    </div>
                                                </div>
                                                <div class="back border-around-dash-green-m background-gradient-cyan-plum">
                                                    <div class="card-body ">
                                                        <h5 class="text-center font-playfair text-20 white-text">
                                                            More Detail
                                                        </h5>
                                                        <p class="text-justify text-18 font-weight-bold white-text">
                                                            {{ mb_substr(strip_tags($coop->descript),0, 300)}}{{ strlen(strip_tags($coop->descript)) > 300 ? "..." : "" }}
                                                        </p>
                                                        <div class="text-center ">
                                                            <a href="{{ $coop->link }}" class="btn btn-green btn-round white-text box-shadown-light-dark ">Go to Partner's Page</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="glide__arrows" data-glide-el="controls">
                                <button class="glide__arrow glide__arrow--left background-tranparent rounded-circle" data-glide-dir="<"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                                <button class="glide__arrow glide__arrow--right background-tranparent rounded-circle" data-glide-dir=">"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addScript')
    <script src="{{ asset('js/parallax.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/glide.min.js') }}"></script>


    <script>
        var glide = new Glide('.glide', {
            type: 'carousel',
            startAt: 0,
            perView: 1,
            autoplay : false,
            hoverpause: true,
            animationDuration: 1000,
            animationTimingFunc: "ease-in-out",
        })
        glide.mount();

        var glide1 = new Glide('.cooperate', {
            type: 'carousel',
            startAt: 0,
            perView: 4,
            gap : 40,
            autoplay : 3000,
            hoverpause: true,
            animationDuration: 1000,
            animationTimingFunc: "ease-in-out",
            breakpoints : {
                1920: {
                    perView: 5,
                },
                1368 : {
                    perView: 4,
                },
                1024: {
                    perView: 4,
                },
                800 : {
                    perView: 3,
                },
                450 : {
                    perView: 1,
                }
            }
        }).mount();
    </script>
    <script>
        $(document).ready(function () {
            $('#jobsTable').DataTable({
                responsive: {
                    details: false
                }
            });
        })
    </script>
@endsection