@extends('layouts.admin')
@section('script')
    <link rel="stylesheet" href="/css/content_post.css">
@endsection
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Thông tin Nhân viên</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue ">
                <div class="row mt-3 background-white padding-top-30 border-top-green">
                    <div class="col">
                        <p>
                            <a href="{{ route('editOurStaff') }}" class="btn btn-primary box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> Change Information</a>
                        </p>
                        <div class="background-litle-white  padding-around-20">
                            @if($info != null)
                                <h5 class=" green-text background-litle-white padding-around-20">Title : {{ $info->title }}</h5>
                                <hr>
                                <h6>Nội dung hiển thị cho Trang Our Staff :</h6>
                                <div class="padding-around-20 background-white shadow-lg">
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
    </div>
@endsection
