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
             style="background-image: url('{{ asset('images/service_background.jpg') }}');
                     background-repeat: no-repeat;
                     background-position: center;
                     background-color: #04C49A;
                     background-blend-mode: luminosity;
                     filter: blur(1px);
                     position: absolute;
                     top: 0;
                     left: 0;
                     right: 0;
                     bottom: 0;"
        >
        </div>
        <div class="present-text position-relative"  data-aos="fade-up" style="padding-top: 100px; padding-bottom: 100px;">
            <h1 class="text-center font-playfair white-text text-shadown-black text-uppercase" style="font-size: 60px; font-weight: 900">
                <span class="out-line-green-big" >Our Services</span>
            </h1>
        </div>
    </div>
    <div class="container mt-2 padding-around position-relative border-around-dash-green-m">
        <div class="text-center padding-around " data-aos="fade-up">
            <h1 class="green-text font-playfair text-shadown-orange-thin">We Are Proud To Providing To You</h1>
        </div>
        <div class="row no-padding-left-right" data-aos="fade-up">
            @foreach($ourservices as $service)
                <div class="col-sm-4">
                    <div class="card w-100 shadow-lg mb-3 card-rotate box-shadown-light-dark" style="overflow: hidden; min-height: 430px; max-height: 430px;">
                        <div class="front">
                            <img class="image-full-width scale-onetwo" style="object-fit: cover; max-height: 200px;" src="{{ $service->image }}" alt="Card image">
                            <div class="card-body position-absolute" style="bottom: 30px">
                                <h4 class="card-title text-center">{{ $service->title }}</h4>
                                <p class="card-text text-justify">{{ mb_substr(strip_tags($service->description),0, 100)}}{{ strlen(strip_tags($service->description)) > 100 ? "..." : "" }}</p>
                            </div>
                        </div>
                        <div class="back border-around-dash-green-m">
                            <div class="card-body ">
                                <h5 class="text-center font-playfair text-20">
                                    More Detail
                                </h5>
                                <p class="text-justify text-18 font-weight-bold">
                                    {{ strip_tags($service->description) }}
                                </p>
                                <div class="text-center">
                                    <a href="{{ route('view_service','service='.encrypt($service->id)) }}" class="btn btn-green btn-round white-text box-shadown-light-dark">View Detail</a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('addScript')
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 100,
            duration: 500,
            easing: 'ease-in-sine',
            delay: 200,
        });
    </script>
@endsection