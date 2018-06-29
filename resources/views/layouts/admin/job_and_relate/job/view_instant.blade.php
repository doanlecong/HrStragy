@if(!empty($job))
    <div class="row">
        <div class="col">
            <a href="{{route('job.edit', $job->id) }}" class="btn btn-block background-gradient-purple box-shadown-light-dark white-text text-18 "><i class="fa fa-pencil mr-3"></i>Edit Job</a>
            <h3 class="font-playfair text-shadown-black mt-3 green-text">{{ $job->job_name }}</h3>
            <h3 class="font-playfair yellow-text text-shadown-orange-thin"><i class="fa fa-money mr-3"></i> {{$job->salary}}</h3>
            <h3 class="green-text font-playfair text-shadown-black" style="overflow: hidden">Image :
                <img src="{{ $job->image }}" alt="Image" class="image-full-width box-shadown-light-dark scale-onetwo border-around-blue">
            </h3>
        </div>
        <hr>
        <div class="col-sm-6 mt-2">
            <h3 class="font-playfair green-text text-shadown-black">Description :</h3>
            <div class="border-around-dash-green-m padding-around-20 text-justify">
                <p class="font-playfair">{{ strip_tags($job->description) }}</p>
            </div>
            <hr>
            <h6>Company Name: <a href="{{ route('company_job.index') }}" class="btn btn-round background-gradient-purple white-text box-shadown-light-dark">{{ $job->company->name }}</a></h6>
            <h6>Location : {{ $job->district_id ?  $job->jobDistrict->name.' ,' : ""}} {{ $job->province_id ? $job->province->name." ," :""}} {{ $job->country->name }}</h6>
            <h6>Job Type : <a href="{{ route('job_type.index') }}" class="btn btn-round background-gradient-purple white-text box-shadown-light-dark">{{$job->jobType->abbr }} -- {{$job->jobType->name}}</a></h6>
            @if(!empty($job->jobCates))
                <h6>Job Category:
                    @foreach($job->jobCates as $cate)
                        {{ " | ".$cate->name }}
                    @endforeach
                </h6>
            @endif
            @if(!empty($job->jobLevels))
                <h6>Job Level :
                    @foreach($job->jobLevels as $level)
                        {{ " | " }}<span class="badge badge-info padding-top-10 padding-bottom-10 mt-2">{{$level->name }}</span>
                    @endforeach
                </h6>
            @endif
            <h6 class="green-text"> Valid in : <span class="green-text">{{ $job->time_from }}</span> to <span class="text-danger">{{ $job->time_to }}</span></h6>

        </div>
        <div class="col-sm-12">
            <h3 class="green-text font-playfair">Content:</h3>
            <div class="border-around-dash-green-m padding-around-20">
                {!! $job->content !!}
            </div>
        </div>
    </div>
@else

@endif