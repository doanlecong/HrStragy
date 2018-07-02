@extends('layouts.app')

@section('scriptTop')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container">
        <div >
            <div style="background: url('{{asset('images/people.jpg')}}'); background-color: #a3dcbc; background-position: center; background-size: cover; background-blend-mode: multiply;" >
                <h1 class="pt-5 mb-5 ml-3 white-text text-uppercase font-playfair text-shadown-orange-thin text-center">Recruitment Service Job Posting</h1>
                <div class="row mb-5 shadow-lg no-padding-left-right no-padding-top no-padding-bottom">
                    <div class="col-sm-12 no-padding-left-right">
                        <div class="row background-tranparent padding-around d-flex justify-content-center no-padding-left-right">
                            <div class="col-sm-12 col-md-4 ">
                                <input type="text" class="form-control" id="name-company" placeholder="Keywords" style="font-size: 0.9rem; padding: 0.55rem 0.5rem; line-height: 1.3;">
                            </div>
                            <div class="col-sm-12 col-md-4 no-padding-left">
                                <select name="" id="job_type" class="form-control" multiple>
                                    @foreach($jobTypes as $jobType)
                                        <option value="{{ $jobType->id}}">{{ $jobType->abbr." - ".$jobType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3 no-padding-right">
                                <select name="`" id="job_location" class="form-control" multiple>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id}}">{{ $province->name." - ".$province->country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button title="Search" id="btn-search" class="btn btn-green btn-block text-18 box-shadown-light-dark"><i class="fa fa-search text-18"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3 class="ml-auto mr-auto font-playfair green-text">The Jobs Need You !</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-9 no-padding-left-right" id="job_list">
                    @if(count($jobs) > 0)
                        @foreach($jobs as $job)
                            <div class="row mt-2 ml-2 mr-2  border-left-green-m background-litle-white box-shadown-light-dark mb-3">
                                <div class="col-sm-4 no-padding-left" style="overflow: hidden;">
                                    @if($job->image != null && $job->image != "NULL" )
                                        <img src="{{ $job->image }}" alt="{{ $job->job_name }}"
                                             class=" image-full-width scale-onetwo image-full-height" style="height: 150px; object-fit: cover;" title="{{ $job->job_name }}">
                                    @else
                                        <img src="{{ asset('upload/images/blankimage.jpg') }}"
                                             class=" image-full-width" title="{{ $job->job_name }}">
                                    @endif
                                </div>
                                <div class="col-sm-8">
                                    <h5 class="font-roboto font-weight-bold blue-text mt-3">
                                        <a class=" animate-bottom-nocontent green-text"
                                           href="{{ route('jobsearch.viewJob', $job->slug.".html") }}">{{ $job->job_name }}</a>
                                    </h5>
                                    <small>Industry : {{ $job->jobType->abbr }}</small>
                                    <p class="font-roboto text-dark">
                                        {{ mb_substr(strip_tags($job->description), 0, 200) }}{{ strlen(strip_tags($job->description)) > 200 ? "...":"" }}
                                    </p>
                                    <h6>Salary : {{ $job->salary }}</h6>
                                    <h6>
                                        <div class="text-left">
                                            Company :{{ $job->company->name }}
                                        </div>
                                        <div class="text-right">
                                            Accepted In : <small class="green-text">{{ $job->time_from }} -- {{ $job->time_to }}</small>
                                        </div>

                                    </h6>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            <h3 class="green-text font-roboto-light"><i class="fa fa-cube"></i> Sorry ! The Job You Are Looking For Is Not Available</h3>
                        </div>

                    @endif
                    <div class="mt-4">
                        {{ $jobs->links() }}
                    </div>
                </div>
                <div class="col-sm-3 no-padding-right">
                    <div class="card card-no-border shadow-lg">
                        <div class="card-header card-no-border">
                            <h4 class=" green-text"><i class="fa fa-check-circle mr-3"></i>For Candidates</h4>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('contactCandidate') }}" class="btn btn-round text-15 white-text btn-block box-shadown-light-dark btn-green">Submit Your Profile</a>
                            <hr>
                            <a href="#footer" class="btn btn-round text-15 white-text btn-block box-shadown-light-dark btn-green">ContactUs</a>
                            <hr>
                            <div class="border-around-dash-green-m padding-top-20">
                                <h4 class="text-center green-text font-playfair">Nhận Job Mới Nhất</h4>
                                <div class=" padding-leftright-10 padding-top-10 padding-bottom-10 ">
                                    <form action="#" id="form_sub" onsubmit="return validateSub();">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email_sub" required placeholder="Email" style="font-size: 0.9rem; color: grey">
                                        </div>
                                        <div class="form-group">
                                            <select name="" id="job_type_sub" class="form-control" required>
                                                @foreach($jobTypes as $jobType)
                                                    <option value="{{ $jobType->id}}">{{ $jobType->abbr." - ".$jobType->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="" id="location_sub" class="form-control" required>
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->id}}">{{ $province->name." - ".$province->country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group text-center mt-3">
                                            <button type="submit" class="btn btn-round btn-green text-18 box-shadown-light-dark"><i class="fa fa-envelope mr-1"></i> Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.assessories.modal_loader_bounce')
@endsection



@section('addScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    @include('layouts.assessories.debounce')
    <script>
        function getJsonPaginate(url = "", e) {
            var data = "";
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": url,
                "method": "GET",
            }
            $.ajax({
                url: url,
                type: "GET",
                success:function(response) {
                    $('#job_list').html(response);
                    $('#modalShowLoading').modal('hide');

                }, error:function (e) {
                    @include('layouts.assessories.handle_error_ajax')
                }
            });
        }
        $(document).on('click', '.pagination .page-item a', function (e) {
            let query = getQuery(false);
            $('#modalShowLoading').modal({
                show:true,
                keyboard:false,
            });
            let currentURL = $(this).attr('href')+query;
            getJsonPaginate(currentURL, e);
            e.preventDefault();
        });
    </script>
    <script>
        function getQuery(isQueryFirst = false) {
            let name = $('#name-company').val();
            let type_jobs = $('#job_type').val();
            let provinces = $('#job_location').val();
            let query = "";
            if (isQueryFirst) {
                query = "?";
            } else {
                query = "&";
            }
            query += "name="+name;
            for(let index in type_jobs) {
                query+= '&job_types['+index+']='+type_jobs[index];
            }

            for(let index in provinces) {
                query+= '&provinces['+index+']='+provinces[index];
            }
            return query;
        }
        let findData = debounce(function () {
            let query = getQuery(true);
            console.log(query);
            $("#modalShowLoading").modal({
                show: true,
                keyboard : false
            });
            $.ajax({
                url:"{{ route('jobsearch') }}"+query,
                crossDomain: true,
                async: true,
                type:"GET",
                success:function (data) {
                    $("#modalShowLoading").modal('hide');
                    $('#job_list').html(data);
                },
                error:function (e) {
                    $("#modalShowLoading").modal('hide');
                    @include('layouts.assessories.handle_error_ajax')
                }
            })

        }, 300);
        $(document).on('click', '#btn-search', function() {
            return findData();
        });
        $(document).on('keypress', '#name-company , #provinces , #type_jobs', function (e) {
            if(e.which == 13) {
                return findData();
            }
        })
    </script>
    <script>

        $('#job_type_sub, #job_type').val(null).trigger('change').select2({ placeholder : "Chuyên Ngành" });
        $('#location_sub, #job_location').val(null).trigger('change').select2({ placeholder : "Location" });
        
        function validateSub() {
            let email = document.getElementById('email_sub');
            let jobtype = document.getElementById('job_type_sub');
            let location = document.getElementById('location_sub');
            if( email.value == "" ) {
                swal({
                    title: "Opp !",
                    text: "Bạn điền thiếu email rồi . Mời bạn nhập lại !",
                    icon: "error",
                    button: "Diền Tiếp",
                });
                return false;
            }
            if(jobtype.value == "") {
                swal({
                    title: "Opp !",
                    text: "Bạn điền thiếu chuyên ngành rồi . Mời bạn nhập lại !",
                    icon: "error",
                    button: "Diền Tiếp",
                });
                return false;
            }
            if(location.value == "") {
                swal({
                    title: "Opp !",
                    text: "Bạn điền thiếu nơi ở hiện tại rồi . Mời bạn nhập lại !",
                    icon: "error",
                    button: "Diền Tiếp",
                });
            }

            let formData = new FormData();
            formData.append('job_type_id', jobtype.value);
            formData.append('province_ìd',location.value);
            formData.append('email', email.value);

            $.ajax({
                url: '{{ route('contactus.mailSubscribe') }}',
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data.success == true) {
                        swal({
                            title: "Thank you!",
                            text: data.message,
                            icon: "success",
                            button: "Tắt !",
                        });
                    }
                    else {
                        swal({
                            title: "Opp !",
                            text: "Đã có lỗi xảy ra . Mời bạn thực hiện lại sau",
                            icon: "error",
                            button: "Tắt !",
                        });
                    }
                },
                error: function (e) {
                    swal({
                        title: "Opp !",
                        text: e.responseJSON.message,
                        icon: "error",
                        button: "Tắt !",
                    });
                }
            }).then(function () {
                let formlienhe = document.getElementById('form_sub');
                formlienhe.reset();
                $('#job_type_sub').val(null).trigger('change').select2({ placeholder : "Chuyên Ngành" });
                $('#location_sub').val(null).trigger('change').select2({ placeholder : "Location" });
            });
            return false;
        }
    </script>
@endsection