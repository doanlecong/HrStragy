@extends('layouts.app')
@section('scriptTop')
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
@endsection
@section('title')
    {{ "HR Strategy Co., Ltd | ".$serviceSelect->name }}
@endsection
@section('content')
    <div class="container-fluid position-relative">
        <div class="image-bachground"
             style="background-image: url('{{ asset('images/bg_client.jpg') }}');
                     background-repeat: no-repeat;
                     background-position: center;
                     background-color: #04C49A;
                     background-size: cover;
                     background-blend-mode: multiply;
                     position: absolute;
                     top: 0;
                     left: 0;
                     right: 0;
                     bottom: 0;"
        >
        </div>
        <div class="present-text position-relative"  style="padding-top: 100px; padding-bottom: 100px;">
            <h1 class="text-center font-playfair green-text text-shadown-black text-uppercase" style="font-size: 60px; font-weight: 900">
                <span class="out-line-green-big">{{ $serviceSelect->name }}</span>
            </h1>
        </div>
    </div>
    <div class="container-fluid mt-2 padding-around-20 position-relative">
        <div class="row background-white padding-bottom-40">
            <div class="col-sm-3">
                <aside class="d-flex justify-content-start border-top-green">
                    <nav>
                        <ul style="list-style: none" class="no-padding-left">
                            @foreach($clientServices as $service)
                                @if($service->id != $serviceSelect->id)
                                    <li><a href="{{ route('view_type_client_service', 'service='.encrypt($service->id)) }}" class="font-playfair text-18 green-text animate-bottom-nocontent">{{ mb_substr($service->name, 0 ,30) }}{{ strlen($service->name) > 30 ? "...":"" }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </aside>
            </div>
            <div class="col-sm-9 no-padding-left">
                <section class="border-top-green " style="width: 100%"  >
                    <div class="header green-text text-center font-playfair" style="font-size: 3rem">{{ $serviceSelect->name }}</div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ $serviceSelect->image }}" class=" box-shadown-light-dark shadow-lg w-25">
                    </div>
                    <h5 class="text-center font-playfair green-text text-20 mt-4">Danh Sách Bài Đăng Liên Quan</h5>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <?php $count =count($serInsides) ?>
                            @if($count > 0)
                                @foreach( $serInsides as $t)
                                    <div class="row mt-2 ml-2 mr-2  border-left-green-m background-litle-white box-shadown-light-dark mb-3">
                                        <div class="col-sm-3 no-padding-left" style="overflow: hidden">
                                            @if($t->image != null && $t->image != "NULL" )
                                                <img src="{{ $t->image }}" alt="{{ $t->name }}"
                                                     class=" image-full-width scale-onetwo " style="height: 150px; object-fit: cover;" title="{{ $t->title }}">
                                            @else
                                                <img src="{{ asset('upload/images/blankimage.jpg') }}"
                                                     class=" image-full-width" title="{{ $t->title }}">
                                            @endif
                                        </div>
                                        <div class="col-sm-9">
                                            <h5 class="font-roboto font-weight-bold blue-text mt-3">
                                                <a class=" animate-bottom-nocontent green-text"
                                                   href="{{ route('view_client_service','service='.$t->id) }}">{{ $t->title }}</a>
                                            </h5>
                                            <p class="font-roboto text-dark text-15">
                                                {{ mb_substr(strip_tags($t->content), 0, 230) }}
                                            </p>
                                        </div>
                                    </div>
                                    {{ $serInsides->appends(request()->query())->links() }}
                                @endforeach
                            @else
                                <h4 class="text-center font-playfair green-text">No Data For This Thing</h4>
                            @endif

                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row mt-5 border-top-green background-white" hidden>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="clip-path"></div>
                        <h3 class="green-text font-playfair ml-3 mt-3"><i class="fa fa-commenting" aria-hidden="true"></i> Send Feedback</h3>
                        <form action="">
                            <div class="form-group">
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <label for="">Full Name (*): </label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="">Email (*):</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="col-sm-12">
                                        <label for="">Message (*):</label>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="text-right mt-3">
                                            <button class="btn btn-green box-shadown-superdark-green text-20 padding-around-20 text-right" type="submit"><i class="fa fa-paper-plane mr-2" aria-hidden="true"></i> SEND</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('addScript')
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 200,
            duration: 1000,
            easing: 'ease-in-sine',
            delay: 200,
        });
    </script>
@endsection