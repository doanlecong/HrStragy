@extends('layouts.admin')
@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Tạo mới Job</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue no-padding-top">
                <div class="row  background-white padding-top-30 border-top-green">
                    <div class="col">
                        @include('layouts.admin.error.list')
                        <form action="{{ route('job.store') }}" onsubmit="return validateFormJob();" novalidate enctype="multipart/form-data" autocomplete="off" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                            <p>
                                <button type="submit" class="btn btn-primary btn-lg box-shadown-light-dark btn-round text-18"><i class="fa fa-archive" aria-hidden="true"></i> SAVE</button>
                            </p>
                            <div class="border-around-dash-green-m padding-around-20">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Tên Job <span class="text-danger">**</span>: </label>
                                            <input type="text" class="form-control" autocomplete="name" id="name" name="name">
                                            <label for="name" class="orange-text" hidden id="alertTitle">Bạn Nên Chọn
                                                Một Tiêu Đề Khác</label>
                                            <label for="name" class="blue-text" hidden id="alertTitleOk">Tiêu đề sử dụng
                                                được đó!</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Job Type <span class="text-danger">**</span>: </label>
                                            <select type="text" class="form-control" id="job_type_id" name="job_type_id">
                                                <option value="">Select Job Type To Load Job Category anh job Level Belongs</option>
                                                @foreach($jobTypes as $jobType)
                                                    <option value="{{ $jobType->id }}">{{ $jobType->abbr }} -- {{ $jobType->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="shade-green"></div>
                                        <div class="form-group">
                                            <label for="title">Job Category (Multi choices): </label>
                                            <select type="text" class="form-control" id="job_cate_id" name="job_cate_id[]" style="height: 40px" multiple>
                                                <option value="">Select Job Type Before</option>
                                            </select>
                                        </div>
                                        <div class="shade-green"></div>
                                        <div class="form-group">
                                            <label for="title">Job Level (Multi choices): </label>
                                            <select type="text" class="form-control" id="job_level_id" name="job_level_id[]" style="height: 40px" multiple>
                                                <option value="">Select Job Type Before</option>
                                            </select>
                                        </div>
                                        <label for="image">Image <span class="text-danger">**</span>: </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="image" data-preview="holder_1"
                                                   class="btn  bg-info text-light">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="image" class="form-control" placeholder="Image's Path" type="text" id="image" name="image" >
                                        </div>
                                        <img id="holder_1" style="margin-top:15px;max-height:100px;">
                                        <hr>
                                        <p>Choose Time To Active Job Searching In Customer's Page <span class="text-danger">**</span></p>
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="input-sm form-control" id="from" name="time_start" placeholder="Active From"/>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"> to </span>
                                            </div>
                                            <input type="text" class="input-sm form-control" id="to" name="time_to" placeholder="Active To"/>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6 form-group no-padding-left">
                                                <label for="title">Age (<small>Range or Single Value</small>): </label>
                                                <input type="text" name="age" placeholder="20 - 30" class="form-control">
                                            </div>
                                            <div class="col-6 form-group no-padding-right">
                                                <label for="title">Sex : </label>
                                                <select name="sex" id="sex" class="form-control">
                                                    <option value=""></option>
                                                    <option value="1">{{ config('global.sex_1') }}</option>
                                                    <option value="2">{{ config('global.sex_2') }}</option>
                                                    <option value="3">{{ config('global.sex_3') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Link Show In Customer Page (<small class="green-text">Auto Generated base on Job's Name</small>)   : </label>
                                            <input type="text" readonly class="form-control" id="slug" name="slug">
                                            <label for="slug" class="orange-text" hidden id="alertSlug">Bạn Nên Chọn Một
                                                Đường Link Khác</label>
                                            <label for="slug" class="orange-text" hidden id="alertSlugFormat">Sai
                                                Format(vd : doi-toi-co-don , không để đuôi .html)</label>
                                            <label for="slug" class="green-text" hidden id="alertSlugOk">Đường Link Được
                                                Chấp Nhận</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Job Of Company <span class="text-danger">**</span>: </label>
                                            <select type="text" class="form-control" id="company_id" name="company_id">
                                                <option value="">Select Company That Job Belongs To</option>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Country <span class="text-danger">**</span>: </label>
                                            <select type="text" class="form-control" id="country_id" name="country_id">
                                                <option value="">Select Country to Load List Of Province</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->code }} -- {{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="shade-green"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Province : </label>
                                            <select type="text" class="form-control" id="province_id" name="province_id">
                                                <option value="">You Should Choose Country Before</option>
                                            </select>
                                            <div class="shade-green"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">District : </label>
                                            <select type="text" class="form-control" id="district_id" name="district_id">
                                                <option value="">This list will be here when chosen province</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Mô tả ngắn:  <span class="text-danger">**</span></label>
                                            <textarea type="text" class="form-control" id="description" name="description" rows="4" style="resize: vertical; max-height: 200px;" placeholder="Some text to display on the customer's page "></textarea>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="salary">Lương (Salary):  <span class="text-danger">**</span></label>
                                            <input type="text" class="form-control" id="salary" name="salary" placeholder="1000$-2000$" title="You can type in the range of salary ">
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Nội dung <span class="text-danger">**</span>: </label>
                                            <textarea name="contentInfo" id="content" class="form-control" rows="10"></textarea>
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
@section('scriptTail')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>
    @include('layouts.assessories.editor')
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
        // $('#lfm2').filemanager('file', {prefix: route_prefix});
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $( function() {
            let dateFormat = "mm/dd/yy",
                from = $( "#from" )
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 3
                    })
                    .on( "change", function() {
                        to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                to = $( "#to" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 3
                })
                    .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
                    });

            function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }

                return date;
            }
        } );
    </script>

    @include('layouts.assessories.debounce')
    <script>
        canUseSlug = false;
        $(document).ready(function () {
            // $('#job_type_id').select2({placeholder: "Please choose"});// , #company_id, #country_id
            $('#slug').click(function () {
                let val = $(this).val();
                if(val != "") {
                    $(this).prop('readonly', false);
                }
            });
            $('#name').change(function (e) {
                let name = $(this).val();
                $.ajax({
                    async: true,
                    crossDomain: true,
                    url: '{{route('job.checkName')}}',
                    type: 'POST',
                    data: {name : name},
                    success: function(data) {
                        console.log(data);
                        $('#slug').val(data.slug);
                        canUseSlug = true;
                    },
                    error:function (e) {
                        @include('layouts.assessories.handle_error_ajax')
                    }
                })
            });
            $('#job_type_id').change(function (e) {
                let idJobType = $(this).val();
                let cateJobSelect = document.getElementById('job_cate_id');
                let levelJobSelect = document.getElementById('job_level_id');
                cateJobSelect.innerHTML = "";
                levelJobSelect.innerText = "";
                $('#job_cate_id, #job_level_id').val(null).trigger('change');
                if (idJobType != "") {
                    $.ajax({
                        async: true,
                        crossDomain: true,
                        url: '{{route('job_type.findRelate')}}',
                        type: 'POST',
                        data: {id : idJobType},
                        success: function (data) {
                            let cateJobs = data.cateJobs;
                            let levelJobs = data.levelJobs;
                            for(let cateJob in cateJobs) {
                                let option = document.createElement('option');
                                option.value = cateJobs[cateJob].id;
                                option.innerText = cateJobs[cateJob].name;
                                cateJobSelect.appendChild(option);
                            }
                            for(let levelJob in levelJobs) {
                                let option = document.createElement('option');
                                option.value = levelJobs[levelJob].id;
                                option.innerText = levelJobs[levelJob].abbrie+" -- "+ levelJobs[levelJob].name;
                                levelJobSelect.appendChild(option);
                            }
                            $('#job_cate_id, #job_level_id').select2({placeholder : "Please choose"});
                        },
                        error:function (e) {
                            @include('layouts.assessories.handle_error_ajax')
                        }
                    });
                } else {
                    $('#job_cate_id, #job_level_id').select2({placeholder: 'Please choose Job Type before'})
                }
            });
            $('#country_id').change(function (e) {
                let countryId = $(this).val();
                let provinceSelect = document.getElementById('province_id');
                provinceSelect.innerHTML = "";
                if(countryId != "") {
                    $.ajax({
                        async: true,
                        crossDomain: true,
                        url: '{{route('country.findRelate')}}',
                        type: 'POST',
                        data: {id : countryId},
                        success: function (data) {
                            let provinces = data.provinces;
                            let option = document.createElement('option');
                            option.value = "";
                            option.innerText = "Please Choose ";
                            provinceSelect.appendChild(option);
                            for(let index in provinces) {
                                let option = document.createElement('option');
                                option.value = provinces[index].id;
                                option.innerText = provinces[index].name;
                                provinceSelect.appendChild(option);
                            }
                            $('#province_id').select2({placeholder: "Please choose"});
                        }, error:function (e) {
                            @include('layouts.assessories.handle_error_ajax')
                        }
                    });
                } else  {
                    let option = document.createElement('option');
                    option.value = "";
                    option.innerText = "Please Choose Country to Show List Provinces";
                    $('#province_id').appendChild(option);
                }

            });

            $('#province_id').change(function (e) {
                let provinceID = $(this).val();
                let districtSelect = document.getElementById('district_id');
                districtSelect.innerHTML = "";
                if(provinceID != "") {
                    $.ajax({
                        async: true,
                        crossDomain: true,
                        url: '{{route('province.relateDistrict')}}',
                        type: 'POST',
                        data: {id : provinceID},
                        success: function (data) {
                            let option = document.createElement('option');
                            option.value = "";
                            option.innerText = "Please Choose ";
                            districtSelect.appendChild(option);
                            let districts = data.districts;
                            for(let index in districts) {
                                let option = document.createElement('option');
                                option.value = districts[index].id;
                                option.innerText = districts[index].name;
                                districtSelect.appendChild(option);
                            }
                            $("#district_id").select2({placeholder: "Please choose"});
                        }, error:function (e) {
                            @include('layouts.assessories.handle_error_ajax')
                        }
                    });
                } else  {
                    let option = document.createElement('option');
                    option.value = "";
                    option.innerText = "Please Choose Province to Show List Districts";
                    districtSelect.appendChild(option);
                }
            })
            $('#slug').change(function(e){
                let isReadOnly = $(this).prop('readonly');
                let val = $(this).val();
                if(!isReadOnly) {
                   $.ajax({
                       async: true,
                       crossDomain: true,
                       url: '{{route('job.checkSlug')}}',
                       type: 'POST',
                       data: {slug :val},
                       success:function(data) {
                           if(data.canUseSlug) {
                               canUseSlug = true;
                               $(this).prop('readonly', true);
                               $('#alertSlugOk').prop('hidden',false);
                               $('#alertSlug').prop('hidden', true);
                           }
                           else {
                               canUseSlug = false;
                               $('#alertSlugOk').prop('hidden',true);
                               $('#alertSlug').prop('hidden', false);
                           }
                       },
                       error:function(e) {
                           @include('layouts.assessories.handle_error_ajax')
                       }
                   })
                }
            })
        })
    </script>
    <script>
        function validateFormJob() {
            let name = document.getElementById('name');
            let job_type_id = document.getElementById('job_type_id');
            let image = document.getElementById('image');
            let from = document.getElementById('from');
            let to = document.getElementById('to');
            let company_id = document.getElementById('company_id');
            let description = document.getElementById('description');
            let salary = document.getElementById('salary');
            let country_id = document.getElementById('country_id');
            let arr = [];
            let isError = false;
            if(name.value == "") {
                name.style.borderBottom = "5px solid red";
                isError = true;
                arr.push('name');
            } else {
                name.style.borderBottom = "5px solid green";
            }
            if(job_type_id.value == "") {
                job_type_id.style.borderBottom = "5px solid red";
                isError = true;
                arr.push('jobtype');
            } else  {
                job_type_id.style.borderBottom = "5px solid green";
            }
            if(image.value == "") {
                isError = true;
                image.style.borderBottom = "5px solid red";
                arr.push('image');
            } else {
                image.style.borderBottom = "5px solid green";
            }
            if(from.value == "") {
                isError = true;
                from.style.borderBottom = "5px solid red";
                arr.push('from');
            } else  {
                from.style.borderBottom = "5px solid green";
            }
            if(to.value == "") {
                isError = true;
                to.style.borderBottom = "5px solid red";
                arr.push('to');
            } else  {
                to.style.borderBottom = "5px solid green";
            }
            if(company_id.value == "") {
                isError = true;
                company_id.style.borderBottom = "5px solid red";
                arr.push('companyid');
            } else  {
                company_id.style.borderBottom = "5px solid green";
            }
            if(description.value == "") {
                isError = true;
                description.style.borderBottom = "5px solid red";
                arr.push('description');
            } else {
                description.style.borderBottom = "5px solid green";
            }
            if(salary.value == "") {
                isError = true;
                salary.style.borderBottom = "5px solid red";
                arr.push('salary');
            } else {
                salary.style.borderBottom = "5px solid green";
            }
            if(country_id.value == "") {
                isError = true;
                country_id.style.borderBottom = "5px solid red";
                arr.push('country');
            } else {
                country_id.style.borderBottom = "5px solid green";
            }

            if(isError) {
                console.log(arr);
                swal({
                    title: "Opp !",
                    text: "Some informations is missing. Check the lable has red mark!",
                    icon: "error",
                    button: "Đóng thôi !",
                });
                return false;
            }
            if(!canUseSlug) {
                swal({
                    title: "Opp !",
                    text: "You Should Change The Link To Show . Current , It is duplicated with the other jobs",
                    icon: "error",
                    button: "Đóng thôi !",
                });
                return false;
            }
            return confirm('Bạn nhớ kiểm tra lại các thông tin . Tránh thiếu sót !');
        }
    </script>
@endsection
