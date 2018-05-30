@extends('layouts.app')
@section('scriptTop')
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
@endsection
@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container-fluid position-relative">
        <div class="image-bachground"
             style="background-image: url('{{ asset('images/service_background.jpg') }}');
                     background-repeat: no-repeat;
                     background-position: center center;
                     background-color: #5dcc60;
                     background-blend-mode: hard-light;
                     filter: blur(3px);
                     position: absolute;
                     top: 0;
                     left: 0;
                     right: 0;
                     bottom: 0;"
        >
        </div>
        <div class="present-text position-relative"  data-aos="fade-up" style="padding-top: 100px; padding-bottom: 100px;">
            <h1 class="text-center font-playfair white-text text-shadown-black text-uppercase" style="font-size: 60px; font-weight: 900">
                <span class="green-text">Service</span> : <span class="out-line-green-big">Name of Service</span>
            </h1>
        </div>
    </div>
    <div class="container mt-2 padding-around-20 position-relative">
        <div class="row">
            <div class="col-sm-3">
                <aside class="d-flex justify-content-start border-top-green">
                    <nav>
                        <ul style="list-style: none" class="no-padding-left">
                            <li><a href="#" class="font-playfair text-20 green-text animate-bottom-nocontent">ESS Service</a></li>
                            <li><a href="#" class="font-playfair text-20 green-text animate-bottom-nocontent">Mass Recruitment</a></li>
                            <li><a href="#" class="font-playfair text-20 green-text animate-bottom-nocontent">Find Your Job</a></li>
                            <li><a href="#" class="font-playfair text-20 green-text animate-bottom-nocontent">About Our Training</a></li>
                            <li><a href="#" class="font-playfair text-20 green-text animate-bottom-nocontent">In House Traning</a></li>
                            <li><a href="#" class="font-playfair text-20 green-text animate-bottom-nocontent">ESS Service</a></li>
                        </ul>
                    </nav>
                </aside>
            </div>
            <div class="col-sm-9 no-padding-left">
                <section class="border-top-green " style="width: 100%"  data-aos="fade-up">
                    <div class="header text-50 green-text text-center font-playfair">ESS Service</div>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="//unsplash.it/300/300" class="border-around-green box-shadown-light-dark">
                    </div>
                    <hr>
                    <h3 class="font-playfair text-center green-text">
                        Dịch Vụ Cung Cấp Nhân Sự Cấp Cao - Dịch Vụ Tuyển Dụng Trọn Gói
                    </h3>
                    <p class="text-right font-weight-bold green-text">
                        09/09/2013
                    </p>
                    <p class="font-weight-bold font-playfair text-20">
                        Chào mừng Anh Chị đến với Dịch vụ Tuyển Chọn Nhân Sự Cấp Cao của HR Strategy
                    </p>
                    <p class="ml-2 text-justify">
                        Chúng tôi chuyên cung cấp dịch vụ tuyển dụng trọn gói: đăng tuyển dụng, tìm kiếm, sàng lọc, phỏng vấn, hẹn lịch phỏng vấn ứng viên chọn,
                        theo dõi các ứng viên cho đến khi kết thúc thời gian thử việc.
                        Chúng tôi có thế mạnh & kinh nghiệm tuyển dụng về các ngành như : <span class="font-playfair green-text">Sản Xuất, FMCG, Bảo Hiểm, Ngân Hàng, Đầu Tư, Dược, Truyền Thông, Thời Trang, Bất Động Sản, Nhà Hàng &amp; Khách Sạn, Dầu Khí và Nhiên Liệu ….</span>
                    </p>
                    <p class="text-20 font-playfair font-weight-bold">
                        Vì sao bạn chọn chúng tôi:
                    </p>

                    <ul class="goodlist font-roboto">
                        <li>
                            Chúng tôi có những đội ngũ nhân viên & chuyên viên tuyển dụng thông mình, nhiệt tình & siêng năng, có kinh nghiệm trong việc thẩm định ứng viên phù hợp với tiêu chí tuyển dụng
                        </li>
                        <li>
                            Chúng tôi tin tưởng & cam kết sẽ tìm thành công ứng viên "<span class="green-text font-playfair ">WILL FIT, WILL DO & CAN DO</span>" cho công ty của anh chị.
                        </li>
                        <li>
                            Bên cạnh sự nỗ lực & làm việc có cam kết. Chúng tôi có một ngân hàng dữ liệu khổng lồ của hơn 60.000 ứng viên thuộc tất cả các lĩnh vực, đặc biệt là rất nhiều ứng cử viên quản lý và cấp độ giám đốc điều hành.

                        </li>
                        <li>
                            Trang web của chúng tôi thu hút rất nhiều lượng truy cập hàng ngày
                        </li>
                        <li>
                            Khách hàng của chúng tôi là những doanh nghiệp có thương hiệu và các công ty đa quốc gia
                        </li>
                    </ul>
                    <p>
                        Hy vọng những điểm mạnh trong tuyển dụng, chúng tôi sẽ giúp cho công ty anh chị có thêm sự lựa chọn & tìm kiếm ứng viên phù hợp nhất
                        Cần hỗ trợ về dịch vụ tuyển chọn ứng viên, vui lòng gởi email về cho chúng tôi qua <a
                                href="mailto:customerservice@hrstrategyvn.com" class="green-text animate-bottom-nocontent">customerservice@hrstrategyvn.com</a> hoặc gọi cho số hotline của công ty chúng tôi: <span class="green-text  ">09 3782 3782</span>. Xin cám ơn.
                    </p>
                </section>
            </div>
        </div>
        <div class="row mt-5 border-top-green">
            <div class="col">
                <div class="clip-path"></div>
                <h3 class="green-text font-playfair ml-3 mt-3"><i class="fa fa-commenting" aria-hidden="true"></i> Send Feedback</h3>
                <form action="">
                    <div class="form-group">
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <label for="">Full Name (*): </label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Email (*):</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="col-sm-12">
                                <label for="">Message (*):</label>
                                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-right mt-3">
                                    <button class="btn btn-green box-shadown-superdark-green text-20 padding-around-20 text-right" type="submit"><i class="fa fa-paper-plane mr-2" aria-hidden="true"></i> SEND</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('addScript')
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 200,
            duration: 1000,
            easing: 'ease-in-sine',
            delay: 200,
        });
    </script>
@endsection