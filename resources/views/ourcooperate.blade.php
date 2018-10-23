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
             style="background-image: url('{{ asset('images/coop.jpg') }}');
                     background-repeat: no-repeat;
                     background-position: center;
                     background-color: #f76819;
                     background-size: cover;
                     background-blend-mode: difference;
                     filter: blur(1px);
                     position: absolute;
                     top: 0;
                     left: 0;
                     right: 0;
                     bottom: 0;"
        >
        </div>
        <div class="present-text position-relative"  data-aos="fade-up" style="padding-top: 100px; padding-bottom: 100px;">
            <h1 class="text-center font-playfair white-text text-shadown-orange-thin text-uppercase" style="font-size: 40px; font-weight: 900">
                Our Cooperates
            </h1>
        </div>
    </div>
    <div class="container padding-around position-relative shadow-lg" style="transform: translateY(-40px); border-top-left-radius: 20px; border-top-right-radius: 20px">
        {{--<div class="text-center padding-around mb-3 shadow-lg" data-aos="fade-up"--}}
            {{--style="background-image: url('{{ asset('images/background_tranparent.png') }}');--}}
                    {{--background-repeat: repeat;--}}
                    {{--background-position: center;--}}
                    {{--background-size: contain;--}}
                    {{--background-color: #04C49A;--}}
                    {{--background-blend-mode: hard-light;--}}
                    {{--">--}}
            {{--<h1 class=" white-text text-shadown-orange-thin">Our Awesome Partners</h1>--}}
        {{--</div>--}}
            <div class="row no-padding-left-right" data-aos="fade-up">
                @foreach($ourCoops as $coop)
                    <div class="col-sm-3">
                        <div class="card w-100  mb-3 box-shadown-light-dark" style="overflow: hidden; min-height: 400px; max-height: 400px;">
                            {{--<div class="front">--}}
                                <img class="image-full-width scale-onetwo" style="object-fit: cover; max-height: 150px;" src="{{ $coop->image_small }}" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title text-center text-hover-green">{{ $coop->title }}</h4>
                                    <h5 class="green-text text-center font-weight-light">______________</h5>
                                    <p class="card-text font-roboto-light text-justify " style="font-size: 12px">{{ mb_substr(strip_tags($coop->descript),0, 100)}}{{ strlen(strip_tags($coop->descript)) > 100 ? "..." : "" }}</p>
                                    <div class="text-center">
                                        <a href="{{ $coop->link }}" class="btn btn-green btn-round white-text box-shadown-light-dark mt-1 text-11">Go to Partner's Page</a>
                                        <button class="ml-1 btn btn-green btn-round white-text box-shadown-light-dark showPartner mt-1 text-11" data-id="{{ $coop->id }}">View Detail</button>
                                    </div>
                                </div>
                            {{--</div>--}}
                            {{--<div class="back border-around-dash-green-m background-gradient-cyan-plum">--}}
                                {{--<div class="card-body ">--}}
                                    {{--<h5 class="text-center font-playfair text-20 white-text">--}}
                                        {{--More Detail--}}
                                    {{--</h5>--}}
                                    {{--<p class="text-justify text-15 font-roboto-light white-text">--}}
                                        {{--{{ mb_substr(strip_tags($coop->descript),0, 300)}}{{ strlen(strip_tags($coop->descript)) > 300 ? "..." : "" }}--}}
                                    {{--</p>--}}
                                   {{----}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                @endforeach
            </div>

    </div>
    <div class="modal fade" id="modalShowPostList" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px;">
            <div class="modal-content no-border-radius">
                <div class="modal-header no-border-radius card-no-border background-litle-white">
                    <h5 class="modal-title green-text" id="exampleModalLongTitle">Cooperate</h5>
                    <button type="button" class="close green-text" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="contentForPostList">
                    <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.assessories.modal_loader_bounce')
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
    <script>
        $(document).ready(function () {
            $('.showPartner').click(function (e) {
                let id = $(this).attr('data-id');
                $('#modalShowLoading').modal({
                    show:true,
                    keyboard: false
                });
                $.ajax({
                    type:'GET',
                    url: '{{ route('ourcooperate.show') }}'+'?coop='+id,
                    success:function (data) {
                        $('#modalShowLoading').modal('hide');
                        $('#modalShowPostList').modal('show');
                        $('#contentForPostList').html(data);
                    },error:function (e) {
                        $('#modalShowLoading').modal('hide');
                        swal({
                            title: "Opp !",
                            text: e.responseJSON.message,
                            icon: "error",
                            button: "Tắt !",
                        });
                    }
                })
            })
        })
    </script>
@endsection