@extends('layouts.app')

@section('scriptTop')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container-fluid background-light-green border-top-green">
        <div class="container no-padding-left-right no-padding-top shadow-lg" id="contact-container">
            <div class="card card-no-border mb-1">
                <div class="card-header card-no-border no-border-radius background-gradient-purple no-padding-left-right no-padding-top no-padding-bottom">
                    <h5 class="font-playfair white-text text-20 text-shadown-orange-thin padding-leftright-10 text-center padding-around-20 text-uppercase">
                        <i class="fa fa-user fa-2x mr-2" aria-hidden="true"></i>&nbsp;Dành cho ứng viên
                    </h5>
                    <div class="shade-dark-purple"></div>
                </div>
                <div class="card-body ">
                    <div class= "row">
                        <div class="col-12 padding-top-30">
                            <h5 class="font-playfair text-justify">
                                Should you wish <span class="font-weight-bold">HRStragy</span> to help you in career path, please fill full your informations as below.
                                We will turn back you as soon as we got a suitable job for you
                            </h5>
                        </div>
                    </div>
                    <form action="#" id="formlienhe_can" onsubmit="return validateForm();">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Name (<span class="text-danger">*</span>) :
                                    </label>
                                    <input type="text" class="form-control border-around-dash-green-m" required id="name_can">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Phone (<span class="text-danger">*</span>) :
                                    </label>
                                    <input type="text" class="form-control border-around-dash-green-m" required id="phone_can">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Email (<span class="text-danger">*</span>) :
                                    </label>
                                    <input type="text" class="form-control border-around-dash-green-m" required id="email_can">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Address (<span class="text-danger">*</span>) :
                                    </label>
                                    <input type="text" class="form-control border-around-dash-green-m" required id="address_can">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Current Position (<span class="text-danger">*</span>) :
                                    </label>
                                    <input type="text" class="form-control border-around-dash-green-m" required id="current_post_can">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Expected Position (<span class="text-danger">*</span>) :
                                    </label>
                                    <input type="text" class="form-control border-around-dash-green-m"required id="expect_post_can">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Industry (<span class="text-danger">*</span>) :
                                    </label>
                                    <input type="text" class="form-control border-around-dash-green-m" required id="industry_can">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Language Skills (<span class="text-danger">*</span>) :
                                    </label>
                                    <input type="text" class="form-control border-around-dash-green-m" required id="language_skill_can">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Current Salary (<span class="text-danger">*</span>) :
                                    </label>
                                    <input type="text" class="form-control border-around-dash-green-m" required id="current_salary_can">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Expected Salary (<span class="text-danger">*</span>) :
                                    </label>
                                    <input type="text" class="form-control border-around-dash-green-m" required id="expect_salary_can">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">
                                        Giới Thiệu (<span class="text-danger">*</span>) :
                                    </label>
                                    <textarea type="text" class="form-control border-around-dash-green-m" rows="5" required id="gioithieu_can"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">
                                        File Description :
                                    </label>
                                    <input type="file" class="form-control-file form-control border-around-dash-green-m" id="file_can">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-4 text-center">
                                <button style="z-index: 1000" class="btn background-gradient-purple white-text box-shadown-light-dark  btn-round pl-3 pr-3 text-18" type="submit" role="button"><i class="fa fa-paper-plane mr-2"></i>Send Informations</button>
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
                    button: "Diền Tiếp",
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