@extends('layouts.app')
@section('scriptTop')
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <meta property="og:url"           content="{{request()->url()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$job->job_name}} | HR Strategy Co., Ltd" />
    <meta property="og:description"   content="{{ strip_tags($job->description) }}" />
    <meta property="og:image"         content="{{asset('images/Logo_1.png')}}" />
@endsection
@section('title')
    {{ "HR Strategy Co., Ltd | ".$job->job_name }}
@endsection
@section('content')
    <div class="container-fluid position-relative background-white">
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
        <div class="present-text position-relative"  style="padding-top: 100px; padding-bottom: 100px;">
            <h1 class="text-center font-playfair white-text text-shadown-orange-thin text-uppercase" style="font-size: 40px; font-weight: 900">
               {{ $job->job_name }}
            </h1>
        </div>
    </div>
    <div class="container-fluid mt-1 padding-leftright-10 position-relative no-padding-left-right">
        <div class="row background-white padding-bottom-40">

            <div class="col-sm-9 ">
                <section class="border-top-green " style="width: 100%" >
                    {{--<div class="d-flex justify-content-center align-items-center">--}}
                        {{--<img src="{{ $job->image }}" class=" box-shadown-light-dark shadow-lg w-50">--}}
                    {{--</div>--}}
                    {{--<hr>--}}
                    <div class="green-text text-center font-playfair text-shadown-black" style="font-size: 2rem">{{ $job->job_name }}</div>
                    <div class="text-center green-text text-18"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $job->jobDistrict!= null ? $job->jobDistrict->name: "" }} {{ $job->province != null ? $job->province->name : ""}} {{ $job->country!= null ? $job->country->name : ""}}</div>
                    <div class="text-center mt-3 mb-3">
                        <a href="{{ route('contactCandidate',['job' => $job->slug.'.'.rand(1000, 9999)]) }}" class="btn btn-round btn-green box-shadown-light-dark white-text text-18">Appply For This Job</a>
                    </div>
                    <div class="info ">
                       <div class="row background-litle-white">
                           <div class="col-sm-6 table-responsive no-padding-left no-padding-right">
                               <table class="table-hover w-100">
                                   <tr>
                                       <th style="padding: 0.5rem">Company</th>
                                       <td class="font-roboto-light green-text text-shadown-black">{{ $job->company != null ? $job->company->name : "" }}</td>
                                   </tr>
                                   <tr>
                                       <th style="padding: 0.5rem">Job Categories</th>
                                       <td >
                                           @foreach($job->jobCates as $cate)
                                               <span style="font-size: 1rem;" title="{{ $cate->name }}" class="badge bg-info white-text box-shadown-light-dark">{{ $cate->name }}</span>
                                           @endforeach
                                       </td>
                                   </tr>
                                   <tr>
                                       <th style="padding: 0.5rem">Age</th>
                                       <td>
                                           <span class="font-roboto-light green-text text-shadown-black">{{ $job->age }}</span>
                                       </td>
                                   </tr>
                                   <tr>
                                       <th style="padding: 0.5rem">Salary </th>
                                       <td>
                                           <span class="font-roboto-light green-text text-shadown-black">{{ $job->salary }}</span>
                                       </td>
                                   </tr>
                               </table>
                           </div>
                           <div class="col-sm-6 table-responsive no-padding-right no-padding-left">
                               <table class="table-hover w-100">
                                   <tr>
                                       <th style="padding: 0.5rem;">Job Type </th>
                                       <td class="font-roboto-light green-text text-shadown-black">{{ $job->jobType ? $job->jobType->name : ""}}</td>
                                   </tr>
                                   <tr>
                                       <th style="padding: 0.5rem;">Job Level</th>
                                       <td >
                                           @foreach($job->jobLevels as $level)
                                               <span style="font-size: 1rem;" title="{{ $level->name }}" class="badge bg-info white-text box-shadown-light-dark">{{$level->abbrie}}</span>
                                           @endforeach
                                       </td>
                                   </tr>
                                   <tr>
                                       <th style="padding: 0.5rem;">Gender</th>
                                       <td>
                                           @if(!empty($job->sex))
                                               <span style="font-size: 1rem;" class="badge bg-info white-text box-shadown-light-dark padding-top-10 padding-bottom-10 mt-2">
                                                    {{ config('global.sex_'.($job->sex == ""  ? 0 : $job->sex)) }}
                                                </span>
                                           @else

                                           @endif
                                       </td>
                                   </tr>
                                   <tr>
                                       <th style="padding: 0.5rem;">Share</th>
                                       <td>
                                           <div class="fb-like" data-href="{{ request()->url() }}" data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
                                       </td>
                                   </tr>
                               </table>
                           </div>
                       </div>
                    </div>
                    {{--<h3 class="font-playfair text-center green-text">--}}
                    {{--{{ strip_tags($job->description) }}--}}
                    {{--</h3>--}}
                    <p class="text-right font-weight-bold green-text">
                        {{ date('d/m/Y', strtotime($job->created_at)) }}
                    </p>
                    <h5 class="text-center font-playfair green-text text-20">Giới thiệu</h5>
                    <hr>
                    <div class="content-service pl-3 pr-3 background-litle-white padding-around-20">
                        {!! $job->content !!}
                    </div>
                </section>
            </div>
            <div class="col-sm-3  border-top-green shadow">
                <h5 class="mt-2 font-roboto-light green-text"><i class="fa fa-bookmark-o pr-2" aria-hidden="true"></i> Related Jobs</h5>
                <aside class="d-flex justify-content-start">
                    <nav>
                        <ul style="list-style: none" class="no-padding-left">
                            @foreach($jobSmalls as $jobSmall)
                                <li><a href="{{ route('jobsearch.viewJob',$jobSmall->slug.".html") }}" class="font-playfair text-20 green-text animate-bottom-nocontent">{{ mb_substr($jobSmall->job_name, 0 ,30) }}{{ strlen($jobSmall->job_name) > 30 ? "...":"" }}</a></li>
                            @endforeach
                            @foreach($jobBigs as $jobSmall)
                                <li><a href="{{ route('jobsearch.viewJob',$jobSmall->slug.".html") }}" class="font-playfair text-20 green-text animate-bottom-nocontent">{{ mb_substr($jobSmall->job_name, 0 ,30) }}{{ strlen($jobSmall->job_name) > 30 ? "...":"" }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </aside>
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
                                    this.page.identifier = "job_{{ $job->created_at.".html" }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
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