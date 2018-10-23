@extends('layouts.app')
@section('scriptTop')
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
@endsection
@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container-fluid position-relative">
        <div class="image-bachground"
             style="background-image: url('{{ asset('images/bg_client.jpg') }}');
                     background-repeat: no-repeat;
                     background-position: center;
                     background-color: #04C49A;
                     background-blend-mode: multiply;
                     background-size: cover;
                     position: absolute;
                     top: 0;
                     left: 0;
                     right: 0;
                     bottom: 0;"
        >
        </div>
        <div class="present-text position-relative"  data-aos="fade-up" style="padding-top: 100px; padding-bottom: 100px;">
            <h1 class="text-center font-playfair white-text text-shadown-orange text-uppercase" style="font-size: 40px; font-weight: 900">
                Client Services
            </h1>
        </div>
    </div>
    <div class="container mt-2 padding-around  shadow-lg position-relative" style="transform: translateY(-40px); border-top-left-radius: 20px; border-top-right-radius: 20px">
        {{--<div class="text-center padding-around " data-aos="fade-up">--}}
            {{--<h1 class="green-text font-playfair text-shadown-orange-thin">Services That Are Inspired From You</h1>--}}
        {{--</div>--}}
        <div class="w-75 ml-auto mr-auto">
            <div class="row no-padding-left-right" data-aos="fade-up">
                @foreach($clientServices as $service)
                    <div class="col-sm-4">
                        <div class="card w-100 mb-3 card-no-border box-shadown-light-dark" style="overflow: hidden; min-height: 400px; max-height: 400px;">
                            {{--<div class="front">--}}
                                <img class="image-full-width scale-onetwo" style="object-fit: cover; max-height: 150px;" src="{{ $service->image }}" alt="Card image">
                                <div class="card-body">
                                    <a href="{{ route('view_type_client_service', $service->slug.".html") }}" style="text-decoration: none"><h5 class="card-title green-text text-hover-green font-roboto-light text-center">{{ $service->name }}</h5></a>
                                    <h5 class="text-center  green-text no-padding-top no-padding-bottom">____________</h5>
                                    <p class="card-text font-roboto-light text-justify">{{ mb_substr(strip_tags($service->descript),0, 100)}}{{ strlen(strip_tags($service->descript)) > 100 ? "..." : "" }}</p>
                                </div>
                            {{--</div>--}}
                            {{--<div class="back border-around-dash-green-m">--}}
                                {{--<div class="card-body ">--}}
                                    {{--<h5 class="text-center font-playfair text-20">--}}
                                        {{--More Detail--}}
                                    {{--</h5>--}}
                                    {{--<p class="text-justify text-18 font-weight-bold">--}}
                                        {{--{{ mb_substr(strip_tags($service->descript),0, 300)}}{{ strlen(strip_tags($service->descript)) > 300 ? "..." : "" }}--}}
                                    {{--</p>--}}
                                    {{--<div class="text-center">--}}
                                        {{--<a href="{{ route('view_type_client_service','service='.encrypt($service->id)) }}" class="btn btn-green btn-round white-text box-shadown-light-dark">View Detail</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
@section('addScript')
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 100,
            duration: 1000,
            easing: 'ease-in-sine',
            delay: 300,
        });
    </script>
@endsection