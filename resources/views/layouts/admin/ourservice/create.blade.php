@extends('layouts.admin')
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Tạo mới Our Service</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue ">
                <div class="row mt-3 background-white padding-top-30 border-top-green">
                    <div class="col">
                        <form action="{{ route('our_service.store') }}" novalidate enctype="application/x-www-form-urlencoded" autocomplete="off" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                            <p>
                                <button type="submit" class="btn btn-primary btn-lg box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> SAVE</button>
                            </p>
                            @include('layouts.admin.error.list')
                            <div class="border-around-green padding-around-20">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Tên Service: </label>
                                            <input type="text" class="form-control" name="title">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="description">Hình đại diện</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="image" data-preview="holder"
                                                   class="btn btn-primary text-light box-shadown-superdarkblue">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="image" class="form-control" type="text" name="image">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                        <hr>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Mô tả ngắn : </label>
                                            <textarea type="text" class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Nội dung : </label>
                                            <textarea name="contentInfo" id="content" class="form-control" rows="10"></textarea>
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
    <script>
        $(document).ready(function () {
            $('input ,textarea').on('click',function () {
                // console.log($(this));
                let ro = $(this).prop('readonly');
                $(this).prop('readonly', false).focus();
            })
        })
    </script>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
    </script>
    @include('layouts.assessories.editor')
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
        // $('#lfm2').filemanager('file', {prefix: route_prefix});
    </script>
@endsection
