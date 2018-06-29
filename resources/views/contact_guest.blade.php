@extends('layouts.app')

@section('scriptTop')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container-fluid background-gradient-orange-violet border-top-green padding-bottom-10">
        <div class=" container no-padding-left-right no-padding-top shadow-lg mt-4 mb-4" id="contact-container">
            <div class="card card-no-border">
                <div class="card-header no-border-radius background-gradient-purple no-padding-left-right no-padding-top no-padding-bottom">
                    <h5 class="font-playfair white-text text-20 text-center text-shadown-orange-thin padding-around-20 text-uppercase">
                        <i class="fa fa-user-circle-o fa-2x mr-3" aria-hidden="true"></i>&nbsp;Dành cho khách hàng
                    </h5>
                    <div class="shade-dark-purple"></div>
                </div>
                <div class="">
                    <div class="card-body padding-top-30">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="font-playfair  text-justify" style="line-height: 2rem;">
                                    Please enter your contact infomation in the contact form below . You can use Unicode Font accented Vietnamese unsigned or to send
                                    information to us
                                </h5>
                            </div>
                        </div>

                        <form action="#" id="formlienhe_khach" onsubmit="return validateForm();">
                            <div class="row no-padding-left-right">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name"></label>
                                        <input type="text" class="form-control border-around-dash-green-m" name="name" id="name_guest" placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone"></label>
                                        <input type="tel" class="form-control border-around-dash-green-m" name="phone" id="phone_guest" placeholder="Phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"></label>
                                        <input type="email" class="form-control border-around-dash-green-m" name="email" id="email_guest" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address"></label>
                                        <input type="text" class="form-control border-around-dash-green-m" name="address" id="address_guest" placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="title"></label>
                                        <input type="text" class="form-control border-around-dash-green-m" name="title" id="title_guest" placeholder="Title" required>
                                    </div>
                                </div>
                                {{--<div class="col-sm-6">--}}

                                {{--</div>--}}
                                {{--<div class="col-sm-6">--}}

                                {{--</div>--}}
                                {{--<div class="col-sm-6">--}}

                                {{--</div>--}}
                                {{--<div class="col-sm-6">--}}

                                {{--</div>--}}
                                <div class="col-sm-6 ">
                                    <div class="form-group">
                                        <label for="title"></label>
                                        <textarea  class="form-control border-around-dash-green-m image-full-height" name="contentInfo" rows="24" id="contentlienhe_guest" placeholder="Content" required style="min-height: 100px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 padding-bottom-40 mt-4 text-center">
                                    <button class="btn background-gradient-purple white-text btn-round pl-3 pr-3 text-20 box-shadown-light-dark " role="button" type="submit"><i class="fa fa-paper-plane mr-2"></i>Send Informations</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('addScript')
    <script>
        function validateForm() {
            let name = document.getElementById('name_guest');
            let phone = document.getElementById('phone_guest');
            let email = document.getElementById('email_guest');
            let title = document.getElementById('title_guest');
            let address = document.getElementById('address_guest');
            let content = document.getElementById('contentlienhe_guest');
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

            if(title.value == "") {
                title.style.borderBottom = "4px solid red";
                isError = true;
            } else  {
                title.style.borderBottom = "4px solid green";
            }

            if (content.value == "") {
                content.focus();
                content.style.borderBottom = " 4px solid red";
                isError = true;
            } else {
                content.style.borderBottom = "4px solid green";
            }
            if(isError) {
                swal({
                    title: "Opp !",
                    text: "Bạn điền thiếu thông tin rồi. Mời bạn nhập lại !",
                    icon: "error",
                    button: "Diền Tiếp",
                });
                return false;
            }
            let formData = new FormData();
            formData.append('name', name.value);
            formData.append('phone',phone.value);
            formData.append('email', email.value);
            formData.append('title', title.value);
            formData.append('address',address.value);
            formData.append('contentlienhe', content.value);

            $.ajax({
                url: '{{ route('contactus.storeGuestInfo') }}',
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
                            button: "Tắt  !",
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
                    swal({
                        title: "Opp !",
                        text: e.responseJSON.message,
                        icon: "error",
                        button: "Tắt !",
                    });
                }
            }).then(function () {
                let formlienhe = document.getElementById('formlienhe_khach');
                formlienhe.reset();
            });
            return false;
        }
    </script>
@endsection