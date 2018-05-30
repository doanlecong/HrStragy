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
                <span class="out-line-green-big">Our Services</span>
            </h1>
        </div>
    </div>
    <div class="container mt-2 padding-around position-relative">
       <section class="border-top-green" style="width: 100%"  data-aos="fade-up">
           <div class="header text-50 green-text text-center font-playfair">Recruitment Service</div>
           <div class="d-flex justify-content-center align-items-center">
               <img src="//unsplash.it/300/300" class="border-around-green box-shadown-light-dark">
           </div>
           <hr>
           <h3 class="font-playfair"><a class="animate-bottom-nocontent green-text" href="{{ route('view_service') }}">ESS Service</a></h3>
           <p>Dịch Vụ Cung Cấp Nhân Sự Cấp Cao - Dịch Vụ Tuyển Dụng Trọn Gói</p>
           <p>Chào mừng Anh Chị đến với Dịch vụ Tuyển Chọn Nhân Sự Cấp Cao của HR Strategy

               Chúng tôi chuyên cung cấp dịch vụ tuyển dụng trọn gói: đăng tuyển dụng, tìm kiếm, sàng lọc, phỏng vấn, hẹn lịch phỏng vấn ứng viên chọn, theo dõi các ứng viên cho đến khi kết thúc thời gian thử việc.</p>

           <hr>
           <h3 class="font-playfair"><a class="animate-bottom-nocontent green-text" href="{{ route('view_service') }}">Mass Recruitment</a></h3>
           <p>Dịch Vụ Cung Cấp Nhân Sự Cấp Cao - Dịch Vụ Tuyển Dụng Trọn Gói</p>
           <p>Chào mừng Anh Chị đến với Dịch vụ Tuyển Chọn Nhân Sự Cấp Cao của HR Strategy

               Chúng tôi chuyên cung cấp dịch vụ tuyển dụng trọn gói: đăng tuyển dụng, tìm kiếm, sàng lọc, phỏng vấn, hẹn lịch phỏng vấn ứng viên chọn, theo dõi các ứng viên cho đến khi kết thúc thời gian thử việc.</p>

           <hr>
           <h3 class="font-playfair">Find Your Job</h3>
           <p>Dịch Vụ Cung Cấp Nhân Sự Cấp Cao - Dịch Vụ Tuyển Dụng Trọn Gói</p>
           <p>Chào mừng Anh Chị đến với Dịch vụ Tuyển Chọn Nhân Sự Cấp Cao của HR Strategy

               Chúng tôi chuyên cung cấp dịch vụ tuyển dụng trọn gói: đăng tuyển dụng, tìm kiếm, sàng lọc, phỏng vấn, hẹn lịch phỏng vấn ứng viên chọn, theo dõi các ứng viên cho đến khi kết thúc thời gian thử việc.</p>
       </section>
       <section class="border-top-green mt-5 position-relative" style="width: 100%" data-aos="fade-left">
           <div class="header text-center text-50 green-text font-playfair">Training Services</div>
           <div class="d-flex justify-content-center align-items-center">
               <img src="//unsplash.it/300/300" class="border-around-green box-shadown-light-dark">
           </div>
           <hr>
           <h3 class="font-playfair">About Training Service</h3>
           <p>Dịch Vụ Cung Cấp Nhân Sự Cấp Cao - Dịch Vụ Tuyển Dụng Trọn Gói</p>
           <p>Chào mừng Anh Chị đến với Dịch vụ Tuyển Chọn Nhân Sự Cấp Cao của HR Strategy

               Chúng tôi chuyên cung cấp dịch vụ tuyển dụng trọn gói: đăng tuyển dụng, tìm kiếm, sàng lọc, phỏng vấn, hẹn lịch phỏng vấn ứng viên chọn, theo dõi các ứng viên cho đến khi kết thúc thời gian thử việc.</p>

           <hr>
           <h3 class="font-playfair">In House Training</h3>
           <p>Dịch Vụ Cung Cấp Nhân Sự Cấp Cao - Dịch Vụ Tuyển Dụng Trọn Gói</p>
           <p>Chào mừng Anh Chị đến với Dịch vụ Tuyển Chọn Nhân Sự Cấp Cao của HR Strategy

               Chúng tôi chuyên cung cấp dịch vụ tuyển dụng trọn gói: đăng tuyển dụng, tìm kiếm, sàng lọc, phỏng vấn, hẹn lịch phỏng vấn ứng viên chọn, theo dõi các ứng viên cho đến khi kết thúc thời gian thử việc.</p>

           <hr>
           <h3 class="font-playfair">Promotion In House</h3>
           <p>Dịch Vụ Cung Cấp Nhân Sự Cấp Cao - Dịch Vụ Tuyển Dụng Trọn Gói</p>
           <p>Chào mừng Anh Chị đến với Dịch vụ Tuyển Chọn Nhân Sự Cấp Cao của HR Strategy

               Chúng tôi chuyên cung cấp dịch vụ tuyển dụng trọn gói: đăng tuyển dụng, tìm kiếm, sàng lọc, phỏng vấn, hẹn lịch phỏng vấn ứng viên chọn, theo dõi các ứng viên cho đến khi kết thúc thời gian thử việc.</p>
       </section>
       <section class="border-top-green mt-5" style="width: 100%;" data-aos="fade-right">
           <div class="header text-50 green-text text-center font-playfair">Oursourcing and Staffing Services</div>
           <div class="d-flex justify-content-center align-items-center">
               <img src="//unsplash.it/300/300" class="border-around-green box-shadown-light-dark">
           </div>
           <hr>
           <h3 class="font-playfair">Oursourcing and Staffing</h3>
           <p>Dịch Vụ Cung Cấp Nhân Sự Cấp Cao - Dịch Vụ Tuyển Dụng Trọn Gói</p>
           <p>Chào mừng Anh Chị đến với Dịch vụ Tuyển Chọn Nhân Sự Cấp Cao của HR Strategy

               Chúng tôi chuyên cung cấp dịch vụ tuyển dụng trọn gói: đăng tuyển dụng, tìm kiếm, sàng lọc, phỏng vấn, hẹn lịch phỏng vấn ứng viên chọn, theo dõi các ứng viên cho đến khi kết thúc thời gian thử việc.
           </p>
       </section>
       <section class="border-top-green mt-5" style="width: 100%;" data-aos="flip-right">
           <div class="header text-50 text-center green-text font-playfair">Human Capital Consultancy Service</div>
           <div class="d-flex justify-content-center align-items-center">
               <img src="//unsplash.it/300/300" class="border-around-green box-shadown-light-dark" >
           </div>
           <hr>
           <h3 class="font-playfair">Human Capital Consultancy</h3>
           <p>Dịch Vụ Cung Cấp Nhân Sự Cấp Cao - Dịch Vụ Tuyển Dụng Trọn Gói</p>
           <p>Chào mừng Anh Chị đến với Dịch vụ Tuyển Chọn Nhân Sự Cấp Cao của HR Strategy

               Chúng tôi chuyên cung cấp dịch vụ tuyển dụng trọn gói: đăng tuyển dụng, tìm kiếm, sàng lọc, phỏng vấn, hẹn lịch phỏng vấn ứng viên chọn, theo dõi các ứng viên cho đến khi kết thúc thời gian thử việc.
           </p>
       </section>
    </div>
@endsection
@section('addScript')
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 400,
            duration: 1000,
            easing: 'ease-in-sine',
            delay: 300,
        });
    </script>
@endsection