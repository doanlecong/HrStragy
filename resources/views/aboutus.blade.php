@extends('layouts.app')
@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container shadow-lg mt-2 mb-2">
        {!! $companyInfo->content !!}
    </div>
@endsection
