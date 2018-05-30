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
    <div class="container mt-2 no-padding-left-right no-padding-top no-padding-bottom">
        <div class="row">
            <div class="col no-padding-left-right">
                <div class="glide">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <li class="glide__slide">
                                <div class="row">
                                    <div class="col-sm-8 no-padding-right no-padding-left">
                                        <img src="//unsplash.it/900/500" class="image-full-width">
                                    </div>
                                    <div class="col-sm-4 background-green  hover-dark border-top-green pt-4 white-text">
                                        <h2 class="font-roboto animated slideInUp">DICH VU ABC</h2>
                                        <p>
                                            Mt ta cho dich vu ABC la cai gif , mo ta ra day , nhung ma ngan thoi , dung dai dong
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="row">
                                    <div class="col-sm-8 no-padding-right no-padding-left ">
                                        <img src="//unsplash.it/900/500" class="image-full-width">
                                    </div>
                                    <div class="col-sm-4 background-green hover-dark border-top-green pt-4 white-text">
                                        <h2 class="font-roboto animated slideInUp">DICH VU ABC</h2>
                                        <p>
                                            Mt ta cho dich vu ABC la cai gif , mo ta ra day , nhung ma ngan thoi , dung dai dong
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="glide__slide">
                                <div class="row">
                                    <div class="col-sm-8 no-padding-right no-padding-left">
                                        <img src="//unsplash.it/900/500" class="image-full-width">
                                    </div>
                                    <div class="col-sm-4 background-green hover-dark border-top-green pt-4 white-text">
                                        <h2 class="font-roboto animated slideInUp">DICH VU ABC</h2>
                                        <p>
                                            Mt ta cho dich vu ABC la cai gif , mo ta ra day , nhung ma ngan thoi , dung dai dong
                                        </p>
                                    </div>
                                </div>
                            </li>
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
    </div>
    <div class="container no-padding-top no-padding-bottom no-padding-left-right">
        <div class="position-relative padding-bottom-40">
            <div class="clip-path"></div>
            <div class="shade-green"></div>
            <div class="border-top-green"></div>
            <h1 class="text-center mt-5 mb-5 green-text text-uppercase font-playfair text-shadown-black">Our Services</h1>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 mb-2 ">
                    <div class="card box-shadown-light-dark no-border-radius card-height-min-200">
                        <div class="card-header topic_green no-border-radius text-center text-18 green-text font-weight-bold height-min-80">Recruitment</div>
                        <div class="card-body no-padding-left-right no-padding-top no-border-radius">
                            <img src="//unsplash.it/300/200" class="card-img image-full-width no-border-radius">
                            <p class="card-text mt-2 padding-around-20">
                                Hello It Me , I wondering ....
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-2">
                    <div class="card box-shadown-light-dark no-border-radius card-height-min-200">
                        <div class="card-header topic_green no-border-radius text-center text-18 green-text font-weight-bold height-min-80">Training</div>
                        <div class="card-body no-padding-left-right no-padding-top no-border-radius">
                            <img src="//unsplash.it/300/200" class="card-img image-full-width no-border-radius">
                            <p class="card-text mt-2 padding-around-20">
                                Hello It Me , I wondering ....
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-2">
                    <div class="card box-shadown-light-dark no-border-radius card-height-min-200">
                        <div class="card-header topic_green no-border-radius text-center text-18 green-text font-weight-bold height-min-80">Human Capital Consultancy</div>
                        <div class="card-body no-padding-left-right no-padding-top no-border-radius">
                            <img src="//unsplash.it/300/200" class="card-img image-full-width no-border-radius">
                            <p class="card-text mt-2 padding-around-20">
                                Hello It Me , I wondering ....
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3 mb-2">
                    <div class="card box-shadown-light-dark no-border-radius card-height-min-200">
                        <div class="card-header topic_green no-border-radius text-center text-18 green-text font-weight-bold height-min-80">Outsourcing & Staffing</div>
                        <div class="card-body no-padding-left-right no-padding-top no-border-radius">
                            <img src="//unsplash.it/300/200" class="card-img image-full-width no-border-radius">
                            <p class="card-text mt-2 padding-around-20">
                                Hello It Me , I wondering ....
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <h1 class="text-center mt-5 mb-5 green-text text-uppercase font-playfair text-shadown-black">New Jobs</h1>
            <div class="row mb-5">
                <div class="col-12">
                    <table class="table table-hover table-striped" id="jobsTable">
                        <thead>
                        <th scope="col">Job Title</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Location</th>
                        <th scope="col">Date Posted</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        </tbody>
                    </table>
                    <h5 class="text-right">
                        <a href="#" class="animate-bottom-nocontent green-text">View More</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container position-relative no-padding-left-right no-padding-top">
        <div class="clip-path"></div>
        <div>
            <div class="shade-green"></div>
            <div class="border-top-green"></div>
            <h1 class="text-center mt-5 mb-5 text-uppercase green-text font-playfair text-shadown-black">Our Cooperates</h1>
            <div class="row mb-5">
                <div class="col">
                    <div class="cooperate">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                                <li class="glide__slide">
                                    <img src="//unsplash.it/900/500" class="image-full-width">
                                </li>
                            </ul>
                        </div>
                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left background-tranparent rounded-circle" data-glide-dir="<"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                            <button class="glide__arrow glide__arrow--right background-tranparent rounded-circle" data-glide-dir=">"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                        </div>
                        {{--<div data-glide-el="controls[nav]" class="glide__bullets">--}}
                        {{--<button data-glide-dir="=0" class="glide__bullet border-around-green box-shadown-light-dark" style="width: 20px;height: 20px;"></button>--}}
                        {{--<button data-glide-dir="=1" class="glide__bullet border-around-green box-shadown-light-dark" style="width: 20px;height: 20px;"></button>--}}
                        {{--<button data-glide-dir="=2" class="glide__bullet border-around-green box-shadown-light-dark" style="width: 20px;height: 20px;"></button>--}}
                        {{--</div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="text-center mt-5 mb-5 text-uppercase green-text font-playfair text-shadown-black">Online Courses</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2 ">
                <div class="card box-shadown-light-dark no-border-radius card-height-min-200">
                    <div class="card-header topic_green no-border-radius text-center text-18 green-text font-weight-bold height-min-80">Nghệ thuât bán hàng</div>
                    <div class="card-body no-padding-left-right no-padding-top no-border-radius">
                        <img src="//unsplash.it/300/200" class="card-img image-full-width no-border-radius">
                        <p class="card-text mt-2 padding-around-20">
                            Hello It Me , I wondering ....
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2">
                <div class="card box-shadown-light-dark no-border-radius card-height-min-200">
                    <div class="card-header topic_green no-border-radius text-center text-18 green-text font-weight-bold height-min-80">Quản trị nhân sự 4.0</div>
                    <div class="card-body no-padding-left-right no-padding-top no-border-radius">
                        <img src="//unsplash.it/300/200" class="card-img image-full-width no-border-radius">
                        <p class="card-text mt-2 padding-around-20">
                            Hello It Me , I wondering ....
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2">
                <div class="card box-shadown-light-dark no-border-radius card-height-min-200">
                    <div class="card-header topic_green no-border-radius text-center text-18 green-text font-weight-bold height-min-80">Online Maketing</div>
                    <div class="card-body no-padding-left-right no-padding-top no-border-radius">
                        <img src="//unsplash.it/300/200" class="card-img image-full-width no-border-radius">
                        <p class="card-text mt-2 padding-around-20">
                            Hello It Me , I wondering ....
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 mb-2">
                <div class="card box-shadown-light-dark no-border-radius card-height-min-200">
                    <div class="card-header topic_green no-border-radius text-center text-18 green-text font-weight-bold height-min-80">Xây dựng đội nhóm vô địch</div>
                    <div class="card-body no-padding-left-right no-padding-top no-border-radius">
                        <img src="//unsplash.it/300/200" class="card-img image-full-width no-border-radius">
                        <p class="card-text mt-2 padding-around-20">
                            Hello It Me , I wondering ....
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h5 class="text-right">
                    <a href="#" class="animate-bottom-nocontent green-text">View More</a>
                </h5>
            </div>

        </div>

    </div>
@endsection

@section('addScript')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/glide.min.js') }}"></script>
    <script>
        var glide = new Glide('.glide', {
            type: 'carousel',
            startAt: 0,
            perView: 1,
            autoplay : 3000,
            hoverpause: true,
            animationDuration: 1000,
            animationTimingFunc: "ease-in-out",
        })
        glide.mount();

        var glide1 = new Glide('.cooperate', {
            type: 'carousel',
            startAt: 0,
            perView: 5,
            gap : 40,
            autoplay : 2000,
            hoverpause: true,
            animationDuration: 1000,
            animationTimingFunc: "ease-in-out",
            breakpoints : {
                1024: {
                    perView: 4,
                },
                800 : {
                    perView: 3,
                },
                450 : {
                    perView: 2,
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