@extends('layouts.app')
@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container shadow-lg mt-2 mb-3 pb-2">
        <div>
            <h1 class="green-text text-center background-litle-white padding-around-20 font-playfair font-weight-bold text-shadown-black">{{ $companyInfo->title }}</h1>
        </div>
        <hr>
        <div>
            {!! $companyInfo->content !!}
        </div>
    </div>
@endsection
