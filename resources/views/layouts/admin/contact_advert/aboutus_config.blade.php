@extends('layouts.admin')
@section('script')
    <link rel="stylesheet" href="/css/content_post.css">
@endsection
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Thông tin About Us và thông tin công ty</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue ">
                <div class="row mt-3 background-white padding-top-30 border-top-green">
                    <div class="col">
                        <p>
                            <a href="{{ route('editAboutUs') }}" class="btn btn-primary box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> Change Information</a>
                        </p>
                        <div class="border-around-green padding-around-20">
                            @if($info != null)
                                <h3>Tên Công Ty : {{ $info->name }}</h3>
                                <h5>Địa chỉ : {{ $info->address }}</h5>
                                <p>
                                    <span>Điện thoại di động {{ $info->mobile_phone }}</span><br>
                                    <span>Điện thoại bàn {{ $info->phone }}</span>
                                </p>
                                <ul class="goodlist">
                                    <li>
                                        <h5><i class="fa fa-facebook blue-text" style="width: 30px;"></i>Facebook : <?php if(!empty($info->facebook)) {?>  <a href="{{ $info->facebook }}" class='btn white-text  btn-round background-blue box-shadown-darkblue'>{{ $info->facebook }}</a> <?php } else { ?> Not Set Up <?php } ?></h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-linkedin blue-text" style="width: 30px;"></i>LinkedIn : <?php if(!empty($info->linkedin)) {?>  <a href="{{ $info->linkedin }}" class='btn white-text  btn-round background-blue box-shadown-darkblue'>{{ $info->linkedin }}</a> <?php } else { ?> Not Set Up <?php } ?></h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-skype blue-text" style="width: 30px;"></i>Skype : <?php if(!empty($info->skype)) {?>  <a href="{{ $info->skype }}" class='btn white-text btn-round background-blue box-shadown-darkblue'>{{ $info->skype }}</a> <?php } else { ?> Not Set Up <?php } ?></h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-google-plus text-danger" style="width: 30px;"></i>Google Plus : <?php if(!empty($info->google)) {?>  <a href="{{ $info->google }}" class='btn white-text  btn-round background-blue box-shadown-darkblue'>{{ $info->google }}</a> <?php } else { ?> Not Set Up <?php } ?></h5>
                                    </li>
                                    <li>
                                        <h5><i class="fa fa-twitter green-text" style="width: 30px;"></i>Twitter : <?php if(!empty($info->twitter)) {?>  <a href="{{ $info->twitter }}" class='btn white-text btn-round background-blue box-shadown-darkblue'>{{ $info->twitter }}</a> <?php } else { ?> Not Set Up <?php } ?></h5>

                                    </li>
                                </ul>
                                <h5>Slogan :</h5>
                                    {!! $info->slogan !!}
                                <h5>Nhà Sáng Lập : </h5>
                                    {!! $info->owner_info !!}
                                <p>
                                    Email: {{ $info->email }}
                                </p>
                                <p>
                                    Ngày thành lập : {{ date('Y/m/d',strtotime($info->ngay_thanh_lap)) }}
                                </p>
                                <h6>Nội dung hiển thị cho Trang AboutUS :</h6>
                                <div class="border-around-green padding-around-20 shadow-lg">
                                    {!! $info->content !!}
                                </div>
                            @else
                                <h5 class="font-playfair font-weight-bold "> Chưa có thông tin nào được hiểu chỉnh !</h5>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modalShowPostList" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1200px;">
            <div class="modal-content no-border-radius">
                <div class="modal-header card_header_gradient">
                    <h5 class="modal-title" id="exampleModalLongTitle">Danh Sách Post Trong Chủ Đề</h5>
                </div>
                <div class="modal-body" id="contentForPostList">
                    <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
