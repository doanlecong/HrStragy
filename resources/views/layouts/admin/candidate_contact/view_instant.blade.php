@if($candidate != null)
    <h2 class="font-playfair green-text text-shadown-black">Tên : {{ $candidate->name }}</h2>
    <div class="row border-around-dash-green-m padding-around-20">
        <div class="col-6">
            <h5>Email : {{ $candidate->email }}</h5>
            <h5>Phone : {{ $candidate->phone }}</h5>
            <h5>Address : {{ strip_tags($candidate->address) }}</h5>
            <h5>Industry : {!!  strip_tags($candidate->industry) !!}</h5>
        </div>
        <div class="col-6">
            <h5>Current Position :  {{ strip_tags($candidate->current_position)}}</h5>
            <h5>Expected Position :  {{ strip_tags($candidate->expected_position)}}</h5>
            <h5>Language Skills :  {{ strip_tags($candidate->language_skills) }}</h5>
            <h5>Current Salary :  {{ strip_tags($candidate->current_salary) }}</h5>
            <h5>Expected Salary :  {{ strip_tags($candidate->expected_salary) }}</h5>
        </div>
        <div class="col">
            <h5 class="green-text">Thông tin :</h5>
            <p class="border-around-dash-green-m padding-around-20">
                {{ strip_tags($candidate->gioithieu) }}
            </p>

            @if(!empty($candidate->file))
                @if(in_array($candidate->file_type, config('global.image_types')))
                    <div class="text-center">
                        <h5>Hình ảnh ứng viên gửi :</h5>
                        <img class="w-50 border-around-dash-green" src="{{ route('candidate.viewImage', $candidate->file)  }}">
                    </div>
                @else

                    <h5 class="font-roboto-light text-20 green-text">File ứng viên gửi : </h5>
                    <div class="text-danger border-around-dash-green-m padding-around-20">
                        <p class="font-roboto-light text-18">Kiểu File: {{ $candidate->file_type }}</p>
                        <a class=" btn text-18 white-text box-shadown-light-dark background-gradient-purple btn-round pl-3 pr-3 " href="{{ route('candidate.downloadFile', $candidate->file) }}" target="_blank">{{ strip_tags($candidate->file) }}</a>
                    </div>
                @endif
            @endif
        </div>
    </div>

    <hr>
@else
    <h5>Somethings went wrong ! May be is has been delete !</h5>
@endif