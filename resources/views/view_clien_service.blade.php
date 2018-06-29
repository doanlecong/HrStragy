@extends('layouts.app')
@section('scriptTop')
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
@endsection
@section('title')
    {{ "HR Strategy Co., Ltd | ".$serviceSelect->title }}
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
            <h1 class="text-center font-playfair white-text text-shadown-black text-uppercase" style="font-size: 40px; font-weight: 900">
                <span class="out-line-green-big">{{ $serviceSelect->title }}</span>
            </h1>
        </div>
    </div>
    <div class="container-fluid mt-2  position-relative">
        <div class="row background-white padding-bottom-40">
            <div class="col-sm-3">
                <div class="shade-green"></div>
                <div class="border-top-green"></div>
                <h6 class="text-center green-text mt-2">Related Topics </h6>
                <aside class="d-flex justify-content-start ">
                    <nav>
                        <ul style="list-style: none" class="no-padding-left">
                            @foreach($clientServices as $service)
                                @if($service->id != $serviceSelect->id)
                                    <li><a href="{{ route('view_type_client_service', 'service='.encrypt($service->id)) }}" class="font-playfair text-20 green-text animate-bottom-nocontent">{{ mb_substr($service->name, 0 ,30) }}{{ strlen($service->name) > 30 ? "...":"" }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>


                </aside>
                <div class="shade-green"></div>
                <div class="border-top-green"></div>
                <h6 class="text-center green-text mt-2">Related Posts</h6>

                <aside>
                    <nav>
                        <ul style="list-style: none" class="no-padding-left">
                            @foreach($relatePosts as $rel)
                                <li><a href="{{ route('view_client_service', 'service='.$rel['id']) }}" class="font-playfair text-18 green-text animate-bottom-nocontent">{{ mb_substr($rel['title'], 0 ,30) }}{{ strlen($rel['title']) > 30 ? "...":"" }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </aside>
            </div>
            <div class="col-sm-9 no-padding-left">
                <section class="border-top-green " style="width: 100%" >
                    {{--<div class="header green-text text-center font-playfair" style="font-size: 3rem">{{ $serviceSelect->title }}</div>--}}
                    <div class="d-flex justify-content-center align-items-center mt-2">
                        <img src="{{ $serviceSelect->image }}" class=" box-shadown-light-dark shadow-lg w-75">
                    </div>
                    <hr>
                    {{--<h3 class="font-playfair text-center green-text">--}}
                    {{--{{ strip_tags($serviceSelect->description) }}--}}
                    {{--</h3>--}}
                    <p class="text-right font-weight-bold green-text">
                        {{ date('d/m/Y', strtotime($serviceSelect->created_at)) }}
                    </p>
                    <h5 class="text-center font-playfair green-text text-20">Giới thiệu</h5>
                    <hr>
                    <div class="content-service">
                        {!! $serviceSelect->content !!}
                    </div>
                </section>
            </div>
        </div>
        <div class="row mt-5 border-top-green background-white">
            <div class="container background-litle-white">
                <div class="row">
                    <div class="col">
                        <div class=" ml-auto mr-auto" style="max-width: 1000px;">
                            <h3 class="green-text text-center font-playfair ml-3 mt-3"><i class="fa fa-commenting" aria-hidden="true"></i> Send Feedback</h3>
                            <div id="disqus_thread"></div>
                            <script>

                                /**
                                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                                var disqus_config = function () {
                                    this.page.url = "{{ request()->url() }}";;  // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = "clientservice_{{ $serviceSelect->created_at.".html" }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };

                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document, s = d.createElement('script');
                                    s.src = 'https://hrstategy.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
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