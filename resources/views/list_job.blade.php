@if(count($jobs) > 0)
    @foreach($jobs as $job)
        <div class="row mt-2 ml-2 mr-2  border-left-green-m background-white box-shadown-light-dark mb-3">
            {{--<div class="col-sm-4 no-padding-left" style="overflow: hidden">--}}
                {{--@if($job->image != null && $job->image != "NULL" )--}}
                    {{--<img src="{{ $job->image }}" alt="{{ $job->job_name }}"--}}
                         {{--class=" image-full-width scale-onetwo image-full-height" style="height: 150px; object-fit: cover;" title="{{ $job->job_name }}">--}}
                {{--@else--}}
                    {{--<img src="{{ asset('upload/images/blankimage.jpg') }}"--}}
                         {{--class=" image-full-width" title="{{ $job->job_name }}">--}}
                {{--@endif--}}
            {{--</div>--}}
            <div class="col">
                <h5 class="font-roboto font-weight-bold blue-text mt-3">
                    <a class=" animate-bottom-nocontent green-text"
                       href="{{ route('jobsearch.viewJob', $job->slug.".html") }}">{{ $job->job_name }}</a>
                </h5>
                <div style="font-size: 13px;">Industry : <span class="badge background-green white-text text-15">{{ $job->jobType->abbr }}</span></div>
                <div class="font-roboto-light text-dark" style="font-size: 13px">
                    {{ mb_substr(strip_tags($job->description), 0, 200) }}{{ strlen(strip_tags($job->description)) > 200 ? "...":"" }}
                </div>
                <h6 class="orange-text">Salary : {{ $job->salary }}</h6>
            </div>
        </div>
    @endforeach
@else
    <div class="text-center">
        <h3 class="green-text font-roboto-light"><i class="fa fa-cube"></i> Sorry ! The Job You Are Looking For Is Not Available</h3>
    </div>

@endif
<div class="mt-4 row">
    <div class="col">
        {{ $jobs->links() }}
    </div>
</div>