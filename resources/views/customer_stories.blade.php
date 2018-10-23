@extends('layouts.app')

@section('scriptTop')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container shadow">
        <div>
            <div class="row bg-info mb-3" hidden>
                <div class="col"
                     style="background:url('/images/exercise.png');background-position: center center; background-size: cover; object-fit: cover; overflow: hidden; height: 200px;
                     background-color: #04C49A;
                     background-blend-mode: color-burn; ">
                    <h1 class="mt-5 mb-2 ml-3 white-text text-uppercase font-playfair text-shadown-orange-thin text-center">Customer Stories</h1>
                    <p class="text-18 text-center font-roboto-light white-text text-shadown-black">
                        Những câu chuyện mang nhiều ý nghĩa trong việc định hưỡng sự nghiệp của bạn .
                    </p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-12">
                    @if(count($custStories) > 0)
                        @foreach($custStories as $custStory)
                            <div class="row mt-2 ml-2 mr-2  border-left-green-m background-litle-white box-shadown-light-dark mb-3">
                                <div class="col-sm-3 no-padding-left" style="overflow: hidden">
                                    @if($custStory->image_thumb != null && $custStory->image_thumb != "NULL" )
                                        <img src="{{ $custStory->image_thumb }}" alt="{{ $custStory->title }}"
                                             class=" image-full-width scale-onetwo " style="height: 150px; object-fit: cover;" title="{{ $custStory->title }}">
                                    @else
                                        <img src="{{ asset('upload/images/blankimage.jpg') }}"
                                             class=" image-full-width" title="{{ $custStory->title }}">
                                    @endif
                                </div>
                                <div class="col-sm-9">
                                    <h5 class="font-roboto font-weight-bold blue-text mt-3">
                                        <a class=" animate-bottom-nocontent green-text"
                                           href="{{ route('viewCustomerStory', $custStory->slug.".html") }}">{{ $custStory->title }}</a>
                                    </h5>
                                    <p class="font-roboto text-dark text-15">
                                        {{ mb_substr(strip_tags($custStory->description), 0, 130) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            <h3><i class="fa fa-cube"></i> No Data For Now</h3>
                        </div>

                    @endif
                    <div class="mt-4">
                        {{ $custStories->links() }}
                    </div>
                </div>
                <div class="col-sm-3 no-padding-right" hidden>
                    <div class="card card-no-border shadow-lg">
                        <div class="card-header card-no-border">
                            <h4 class=" green-text"><i class="fa fa-check-circle mr-3"></i>Information</h4>
                        </div>
                        <div class="card-body">
                        <h5 class="font-roboto-light text-justify">
                            Đây là những câu chuyện được sưu tầm cũng như đóng góp của khách hàng. Bài viết mới sẽ được gửi tới quý vị mỗi tuần vào thứ hai.
                            Xin cám ơn quý vị đã dành thời gian để đọc qua những bài viết này . Mọi ý kiến thắc mắc , quý vị và các bạn có thể gửi thông tin về form contact us bên dưới
                        </h5>
                            <div class="text-center">
                                <a class="btn btn-block btn-green shadow white-text text-18 text-left" href="#formlienhe">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-relative padding-around background-light-green" hidden>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4 class="font-playfair">
                            Should you wish <span class="font-weight-bold">HRStragy</span> to help you in career path, please fill full your informations as below.
                            We will turn back you as soon as we got a suitable job for you
                        </h4>
                    </div>
                </div>

                <form action="">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">
                                    Name (*) :
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">
                                    Phone (*) :
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">
                                    Email (*) :
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">
                                    Location (*) :
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">
                                    Current Position (*) :
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">
                                    Expected Position (*) :
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">
                                    Industry (*) :
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">
                                    Language Skills (*) :
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">
                                    Current Salary (*) :
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">
                                    Expected Salary (*) :
                                </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">
                                    Expected Salary (*) :
                                </label>
                                <textarea type="text" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">
                                    Expected Salary (*) :
                                </label>
                                <input type="file" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <button style="z-index: 1000" class="btn btn-green box-shadown-superdark-green btn-block" type="button">Send Informations</button>
                    <hr>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('addScript')
    <script>
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