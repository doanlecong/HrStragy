@extends('layouts.app')

@section('scriptTop')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container-fluid background-white pt-3 pb-3">
        <div class="container no-padding-left-right no-padding-top shadow-lg rounded" id="contact-container">
            <div class="card card-no-border mb-1">
                {{--<div class="card-header card-no-border no-border-radius background-gradient-purple no-padding-left-right no-padding-top no-padding-bottom">--}}
                    {{--<h5 class="font-playfair white-text text-20 text-shadown-orange-thin padding-leftright-10 text-center padding-around-20 text-uppercase">--}}
                        {{--<i class="fa fa-user fa-2x mr-2" aria-hidden="true"></i>&nbsp;Dành cho ứng viên--}}
                    {{--</h5>--}}
                    {{--<div class="shade-dark-purple"></div>--}}
                {{--</div>--}}
                <div class="card-body ">
                    <div class= "row">
                        <div class="col-12">
                            <h5 class="font-playfair text-justify">
                                Should you wish <span class="font-weight-bold">HRStragy</span> to help you in career path, please fill full your informations as below.
                                We will turn back you as soon as we got a suitable job for you
                            </h5>
                        </div>
                    </div>
                    <form action="#" id="formlienhe_can" onsubmit="return validateForm();">
                        <div class="row">
                            <div class="col-sm-4 no-padding-left-right">
                                <div class="form-group row">
                                    <div class="col-3 no-padding-right">
                                        <label for="" class="text-11">
                                            Name (<span class="text-danger">*</span>) :
                                        </label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control " required id="name_can">
                                        <input type="text" id="job_id" hidden value="{{ $job_id ?? -1 }}">
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-4 no-padding-left-right">
                                <div class="form-group row">
                                    <div class="col-3 no-padding-right">
                                        <label for="" class="text-11">
                                            Phone (<span class="text-danger">*</span>) :
                                        </label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control " required id="phone_can">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 no-padding-left-right">
                                <div class="form-group row">
                                    <div class="col-3 no-padding-right">
                                        <label for="" class="text-11">
                                            Email (<span class="text-danger">*</span>) :
                                        </label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control " required id="email_can">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 no-padding-left-right">
                                <div class="form-group row">
                                    <div class="col-3 no-padding-right">
                                        <label for="" class="text-11">
                                            Expected Working Location (<span class="text-danger">*</span>) :
                                        </label>
                                    </div>
                                    <div class="col-9">
                                        @if(!empty($addresses) && count($addresses) > 0)
                                            <select name="addresses" class="form-control"  required id="address_can">
                                                <option value="All Locations">All Locations</option>
                                                @foreach($addresses as $province)
                                                    <option value="{{ $province->name." - ".(@$province->country->name ?? '') }}">{{ $province->name." - ".(@$province->country->name ?? '') }}</option>
                                                @endforeach    
                                            </select>
                                        @else 
                                            <input type="text" class="form-control " required id="address_can">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 no-padding-left-right">
                                <div class="form-group row">
                                    <div class="col-3 no-padding-right">
                                        <label for="" class="text-11">
                                            Current Position (<span class="text-danger">*</span>) :
                                        </label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control " required id="current_post_can">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 no-padding-left-right">
                                <div class="form-group row">
                                    <div class="col-3 no-padding-right">
                                        <label for="" class="text-11">
                                            Expected Position (<span class="text-danger">*</span>) :
                                        </label>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control "required id="expect_post_can">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 no-padding-left-right">
                                <div class="form-group row">
                                    <div class="col-2 no-padding-right">
                                        <label for="" class="text-11">
                                            Industry (<span class="text-danger">*</span>) :
                                        </label>
                                    </div>
                                    <div class="col-10">
                                        @if(!empty($jobTypes) && count($jobTypes) > 0)
                                            <select name="industry" class="form-control" required id="industry_can">
                                                <option value="All Industries">All Industries</option>
                                                @foreach($jobTypes as $jobType)
                                                    <option value="{{ $jobType->name }}">{{ $jobType->abbr." - ".$jobType->name }}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <input type="text" class="form-control " required id="industry_can">
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 no-padding-left-right">
                                <div class="form-group row">
                                    <div class="col-2 no-padding-right">
                                        <label for="" class="text-11">
                                            Language Skills (<span class="text-danger">*</span>) :
                                        </label>
                                    </div>
                                    <div class="col-10">
                                            <select class="form-control" name="language_skill_can" id="language_skill_can" required>
                                            <option value="All Languages">All Languages</option>
                                            <option value="English">English</option>
                                            <option value="Japan">Japan</option>
                                            <option value="China">China</option>
                                            <option value="English and Japan">English and Japan</option>
                                            <option value="English and China">Englist and China</option>
                                            <option value="China and Japan">China and Japan</option>
                                            <option value="French">French</option>
                                            <option value="Itaty">Italy</option>
                                            <option value="Russia">Russia</option>
                                        </select>
                                        {{--<input type="text" class="form-control " required id="language_skill_can">--}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 no-padding-left-right">
                                <div class="form-group row">
                                    <div class="col-2 no-padding-right">
                                        <label for="" class="text-11">
                                            Current Salary (<span class="text-danger">*</span>)
                                        </label>
                                    </div>
                                    <div class="col-10">
                                        <input type="text" class="form-control " required id="current_salary_can">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 no-padding-left-right">
                                <div class="form-group row">
                                    <div class="col-2 no-padding-right">
                                        <label for="expect_salary_can" class="text-11">
                                            Expected Salary (<span class="text-danger">*</span>)
                                        </label>
                                    </div>
                                    <div class="col-10">
                                        <input type="text" class="form-control " required id="expect_salary_can">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="gioithieu_can" class="text-11">
                                        Sumary your qualifications & Experiences here (<span class="text-danger">*</span>) :
                                    </label>
                                    <textarea type="text" class="form-control " rows="5" required id="gioithieu_can"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="file_can" class="text-11">
                                        Attached your profile
                                    </label>
                                    <input type="file" class="form-control-file form-control " id="file_can">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4 text-center">
                                <button style="z-index: 1000" class="btn background-green white-text box-shadown-light-dark  btn-round pl-3 pr-3 text-18" type="submit" role="button"><i class="fa fa-paper-plane mr-2"></i>Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @include('layouts.assessories.modal_loader_bounce')
@endsection

@section('addScript')
    <script>
        function validateForm() {
            let name = document.getElementById('name_can');
            let phone = document.getElementById('phone_can');
            let email = document.getElementById('email_can');
            let address = document.getElementById('address_can');
            let currentPost = document.getElementById('current_post_can');
            let expectPost = document.getElementById('expect_post_can');
            let industry = document.getElementById('industry_can');
            let language = document.getElementById('language_skill_can');
            let currentSalary = document.getElementById('current_salary_can');
            let expectSalary = document.getElementById('expect_salary_can');
            let gioithieu = document.getElementById('gioithieu_can');
            let file = document.getElementById('file_can');
            let jobId = document.getElementById('job_id').value;

            let isError =  false;
            if (name.value == "") {
                name.style.borderBottom = "4px solid red";
                name.focus();
                isError = true;
            } else {
                name.style.borderBottom = "4px solid green";
            }

            if(phone.value == "") {
                phone.style.borderBottom = "4px solid red";
                phone.focus();
                isError = true;
            } else {
                phone.style.borderBottom = "4px solid green";
            }

            if (email.value == "") {
                // console.log('chay valid form Email ');
                email.style.borderBottom = " 4px solid red";
                email.focus();
                isError = true;
            } else {
                email.style.borderBottom = "4px solid green";
            }

            if(address.value == "") {
                address.style.borderBottom = "4px solid red";
                address.focus();
                isError = true;
            } else {
                address.style.borderBottom = "4px solid green";
            }

            if(currentPost.value == "") {
                currentPost.style.borderBottom = "4px solid red";
                isError = true;
            } else  {
                currentPost.style.borderBottom = "4px solid green";
            }

            if(expectPost.value == "") {
                expectPost.style.borderBottom = "4px solid red";
                isError = true;
            } else  {
                expectPost.style.borderBottom = "4px solid green";
            }

            if(industry.value == "") {
                industry.style.borderBottom = "4px solid red";
                isError = true;
            } else  {
                industry.style.borderBottom = "4px solid green";
            }


            if(language.value == "") {
                language.style.borderBottom = "4px solid red";
                isError = true;
            } else  {
                language.style.borderBottom = "4px solid green";
            }

            if(currentSalary.value == "") {
                currentSalary.style.borderBottom = "4px solid red";
                isError = true;
            } else  {
                currentSalary.style.borderBottom = "4px solid green";
            }

            if(expectSalary.value == "") {
                expectSalary.style.borderBottom = "4px solid red";
                isError = true;
            } else  {
                expectSalary.style.borderBottom = "4px solid green";
            }
            if(gioithieu.value == "") {
                gioithieu.style.borderBottom = "4px solid red";
                isError = true;
            } else  {
                gioithieu.style.borderBottom = "4px solid green";
            }

            if(isError) {
                swal({
                    title: "Opp !",
                    text: "Bạn điền thông tin rồi. Mời bạn nhập lại !",
                    icon: "error",
                    button: "Diền Tiếp",
                });
                return false;
            }

            if (file.value != "" && file.files[0].size > 3145728) {
                file.focus();
                file.style.borderBottom = " 4px solid red";
                swal({
                    title: "Opp !",
                    text: "Xin lỗi . File bạn gửi có dung lượng lớn quá(max: 3MB) !",
                    icon: "error",
                    button: "Điền Tiếp",
                });
                return false;
            } else {
                file.style.borderBottom = "4px solid green";
            }


            let formData = new FormData();
            formData.append('name', name.value);
            formData.append('phone',phone.value);
            formData.append('email', email.value);
            formData.append('address',address.value);
            formData.append('current_post', currentPost.value);
            formData.append('expect_post',expectPost.value);
            formData.append('industry', industry.value);
            formData.append('language',language.value);
            formData.append('current_salary', currentSalary.value);
            formData.append('expect_salary', expectSalary.value);
            formData.append('gioithieu', gioithieu.value);
            formData.append('job_id', jobId);

            if(file.value != "") {
                formData.append('file', file.files[0]);
            }
            let modal = $("#modalShowLoading");
            modal.modal({
                show : true,
                keyboard :false
            });
            $.ajax({
                url: '{{ route('contactus.storeCandidateInfo') }}',
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    modal.modal('hide');
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
                            button: "Tắt  !",
                        });
                    }

                },
                error: function (e) {
                    modal.modal('hide');
                    swal({
                        title: "Opp !",
                        text: e.responseJSON.message,
                        icon: "error",
                        button: "Tắt nó !",
                    });
                }
            }).then(function () {
                let formlienhe = document.getElementById('formlienhe_can');
                formlienhe.reset();
            });
            return false;
        }
    </script>
@endsection