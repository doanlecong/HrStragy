@extends('layouts.app')
@section('scriptTop')
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
@endsection
@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container-fluid position-relative" hidden>
        <div class="image-bachground"
             style="background-image: url('{{ asset('images/service_background.jpg') }}');
                     background-repeat: no-repeat;
                     background-position: center;
                     background-color: #04C49A;
                     background-blend-mode: hard-light;
                     filter: blur(1px);
                     position: absolute;
                     top: 0;
                     left: 0;
                     right: 0;
                     bottom: 0;"
        >
        </div>
        <div class="present-text position-relative"  data-aos="fade-up" style="padding-top: 100px; padding-bottom: 100px;">
            <h1 class="text-center font-playfair white-text text-shadown-orange text-uppercase" style="font-size: 3rem; font-weight: 900">
               {{ $serviceSelect->title }}
            </h1>
        </div>
    </div>
    <div class="container-fluid position-relative mt-2">
        <div class="row background-white padding-bottom-40">
            <div class="col-sm-3 shadow-sm">
                <aside class="d-flex justify-content-start border-top-green">
                    <nav>
                        <ul style="list-style: none" class="no-padding-left">
                            @foreach($ourservices as $service)
                                @if($service->id != $serviceSelect->id)
                                    <li><a href="{{ route('view_service', $service->slug.".html") }}" class="font-playfair text-20 green-text animate-bottom-nocontent">{{ mb_substr($service->title, 0 ,30) }}{{ strlen($service->title) > 30 ? "...":"" }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </aside>
            </div>
            <div class="col-sm-9">
                <section class="border-top-green " style="width: 100%"  data-aos="fade-up">
                    <div class="header green-text text-center font-playfair" style="font-size: 2rem">{{ $serviceSelect->title }}</div>
                    {{--<div class="d-flex justify-content-center align-items-center">--}}
                        {{--<img src="{{ $serviceSelect->image }}" class=" box-shadown-light-dark shadow-lg w-75">--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                    {{--<h3 class="font-playfair text-center green-text">--}}
                        {{--{{ strip_tags($serviceSelect->description) }}--}}
                    {{--</h3>--}}
                    {{--<p class="text-right font-weight-bold green-text">--}}
                        {{--{{ date('d/m/Y', strtotime($serviceSelect->created_at)) }}--}}
                    {{--</p>--}}
                    {{--<h5 class="text-center font-playfair green-text text-20">Giới thiệu</h5>--}}
                    <hr>
                    <div class="content-service">
                        {!! $serviceSelect->content !!}
                    </div>
                </section>
            </div>
        </div>
        <div class="row mt-1 border-top-green background-white">
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
                                    this.page.identifier = "ourservice_{{ $serviceSelect->created_at.".html" }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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
            duration: 500,
            easing: 'ease-in-sine',
            delay: 200,
        });
    </script>
@endsection