@extends('layouts.app')
@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container-fluid background-light-green shadow-lg mt-2 d-flex justify-content-center align-items-center" style="height: 90vh;
        background: url('{{ asset('images/background_tranparent.png') }}');
            background-position: top left; background-repeat: repeat; background-size: auto; background-color: #165b4a; background-blend-mode: overlay;">
        <div class="padding-around">
            <img src="{{ asset('images/notfound.gif') }}" alt="Not Found" style="height: 70vh">
            <h2 class="font-lobster text-shadown-black white-text">Somethings went wrong ! Meo ....</h2>
        </div>

    </div>
@endsection
