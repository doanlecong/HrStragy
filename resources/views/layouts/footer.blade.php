
<div class="footer" id="footer"
     style="background: url('/images/bg_footer.jpg'); background-position: center; background-size: cover; background-color: #039874; background-blend-mode: multiply;">
    <div class="container-fluid no-padding-left-right no-padding-bottom">
        <div class="row padding-bottom-40 padding-top-10 background-litle-tranparent padding-around">
            <div class="col-sm-7 padding-top-10 font-playfair">
                <h1 class="danhmuc white-text text-shadown-orange-thin" style="font-size: 40px">
                    {{ $info->name }}</h1>

                <p class="danhmuc white-text text-20 font-roboto-light">
                    <i class="fa fa-map-o" style="width: 30px;" aria-hidden="true"></i> {{ $info->address }}
                </p>

                <p class="danhmuc white-text text-20 font-roboto-light">
                    <i class="fa fa-mobile fa-2x" style="width: 30px;" aria-hidden="true"></i> {{ $info->mobile_phone }}
                </p>
                <p class="danhmuc white-text text-20 font-roboto-light">
                    <i class="fa fa-phone" style="width: 30px;" aria-hidden="true"></i> {{ $info->phone }}
                </p>
                <p class="danhmuc white-text text-20 font-roboto-light">
                    <i class="fa fa-envelope-o" style="width: 30px;" aria-hidden="true"></i> {{ $info->email }}
                </p>
                <p class="danhmuc white-text text-20 font-roboto-light">
                    <i class="fa fa-globe" style="width: 30px;" aria-hidden="true"></i>  <a class="white-text animate-bottom-nocontent" href="{{ route('homepage') }}" target="_blank">www.hrstrategy.vn</a>
                </p>
                <p><?php if(!empty($info->facebook)) {?>  <a href="{{ $info->facebook }}" class='btn white-text  rounded-circle  ml-2 btn-round bg-info box-shadown-light-dark' style="padding: 10px;"><i class="fa fa-facebook fa-2x white-text" style="width: 30px;"></i></a> <?php } ?>
                <?php if(!empty($info->linkedin)) {?>  <a href="{{ $info->linkedin }}" class='btn white-text  rounded-circle  ml-2 btn-round bg-info box-shadown-light-dark'  style="padding: 10px;"><i class="fa fa-linkedin fa-2x white-text" style="width: 30px;"></i></a> <?php }  ?>
                <?php if(!empty($info->skype)) {?>  <a href="{{ $info->skype }}" class='btn white-text rounded-circle  ml-2 btn-round bg-info box-shadown-light-dark' style="padding: 10px;"><i class="fa fa-skype  fa-2x white-text" style="width: 30px;"></i></a> <?php } ?>
                <?php if(!empty($info->google)) {?>  <a href="{{ $info->google }}" class='btn white-text  rounded-circle  ml-2 btn-round bg-info box-shadown-light-dark' style="padding: 10px;"><i class="fa fa-google-plus fa-2x white-text" style="width: 30px;"></i></a> <?php } ?>
                <?php if(!empty($info->twitter)) {?>  <a href="{{ $info->twitter }}" class='btn white-text rounded-circle pml-2 btn-round bg-info box-shadown-light-dark' style="padding: 10px;"><i class="fa fa-twitter fa-2x white-text" style="width: 30px;"></i></a> <?php } ?></p>
            </div>
            <div class="col-sm-5 padding-top-10">
                <h1 class=" white-text text-shadown-orange-thin font-playfair" style="font-size: 40px">
                    Contact Us:
                </h1>
                <p class="white-text">
                    Please enter your contact information in the contact form below. You can use Unicode Font accented Vietnamese unsigned or to send information to us
                </p>
                <form action="#" id="formlienhe" onsubmit="return validate();">
                    <div class="row no-padding-left-right border-around-dash-green">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name"></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone"></label>
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="address"></label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="title"></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title"></label>
                                <textarea class="form-control" name="contentInfo" rows="5" id="contentlienhe" placeholder="Content" style="min-height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 padding-bottom-40">
                            <button class="nav-link white-text btn btn-green" role="button" type="submit"><i class="fa fa-paper-plane mr-2"></i> Done</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <p class="text-center white-text mb-0">
            @Designed and Developed By <a href="https://doanlee.com" class="animate-bottom-nocontent white-text">Doan Lee</a>
            .All rights reserved.
        </p>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function validate() {
        let name = document.getElementById('name');
        let phone = document.getElementById('phone');
        let email = document.getElementById('email');
        let title = document.getElementById('title');
        let address = document.getElementById('address');
        let content = document.getElementById('contentlienhe');
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
            url: '{{ route('contactus.sendinfo') }}',
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
            let formlienhe = document.getElementById('formlienhe');
            formlienhe.reset();
        });
        return false;
    }
</script>