@extends('layouts.app')
@section('scriptTop')
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
@endsection
@section('title')
    {{ "HR Strategy Co., Ltd | ".$story->title }}
@endsection
@section('content')
    <div class="container-fluid position-relative">
        <div class="image-bachground"
             style="background-image: url('{{ asset('images/exercise.png') }}');
                     background-repeat: no-repeat;
                     background-position: center;
                     background-color: #04C49A;
                     background-blend-mode: hard-light;
                     background-size: cover;
                     filter: blur(2px);
                     position: absolute;
                     top: 0;
                     left: 0;
                     right: 0;
                     bottom: 0;"
        >
        </div>
        <div class="present-text position-relative"  style="padding-top: 100px; padding-bottom: 100px;">
            <h1 class="text-center font-playfair white-text text-shadown-black text-uppercase" style="font-size: 40px; font-weight: 900">
                <span class="out-line-green-big">{{ $story->title }}</span>
            </h1>
        </div>
    </div>
    <div class="container-fluid mt-2  position-relative">
        <div class="row background-white padding-bottom-40">
            <div class="col-sm-3">
                <div class="shade-green"></div>
                <div class="border-top-green"></div>
                <h6 class="text-center green-text mt-2">Related Stories </h6>
                <aside class="d-flex justify-content-start ">
                    <nav>
                        <ul style="list-style: none" class="no-padding-left">
                            @foreach($storyList as $st)
                                @if($st['id'] != $story->id)
                                    <li><a href="{{ route('viewCustomerStory', 'story='.$st['id']) }}" class="font-playfair text-18 green-text animate-bottom-nocontent">{{ mb_substr($st['title'], 0 ,30) }}{{ strlen($st['title']) > 30 ? "...":"" }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>


                </aside>
            </div>
            <div class="col-sm-9 ">
                <section class="border-top-green " style="width: 100%" >
                    {{--<div class="header green-text text-center font-playfair" style="font-size: 3rem">{{ $serviceSelect->title }}</div>--}}
                    <div class="d-flex justify-content-center align-items-center mt-2">
                        <img src="{{ $story->image_thumb }}" class=" box-shadown-light-dark shadow-lg w-75">
                    </div>
                    <hr>
                    {{--<h3 class="font-playfair text-center green-text">--}}
                    {{--{{ strip_tags($serviceSelect->description) }}--}}
                    {{--</h3>--}}
                    <p class="text-right font-weight-bold green-text">
                        {{ date('d/m/Y', strtotime($story->created_at)) }}
                    </p>
                    <h5 class="text-center font-playfair green-text text-20">Nội dung</h5>
                    <hr>
                    <div class="content-service">
                        {!! $story->content !!}
                    </div>
                </section>
            </div>
        </div>
        <div class="row mt-5 border-top-green background-white">
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