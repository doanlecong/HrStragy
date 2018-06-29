@extends('layouts.admin')
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Tạo mới Job Type</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue no-padding-top">
                <div class="row  background-white padding-top-30 border-top-green">
                    <div class="col">
                        @include('layouts.admin.error.list')
                        <form action="{{ route('change_info.store_password') }}"  enctype="application/x-www-form-urlencoded" autocomplete="off" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                            <p>
                                <button type="submit" class="btn btn-primary btn-lg box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> SAVE</button>
                            </p>
                            <div class="border-around-green padding-around-20">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="abbr">Mật Khẩu Mới *: </label>
                                            <input type="text" class="form-control" name="password" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Xác Nhận Lại Mật Khẩu : </label>
                                            <input type="text" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
@section('scriptTail')

@endsection
