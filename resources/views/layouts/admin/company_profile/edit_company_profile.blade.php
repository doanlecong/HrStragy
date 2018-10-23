@extends('layouts.admin')
@section('script')
    <link rel="stylesheet" href="/css/content_post.css">
@endsection
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Thông tin Company Profile</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue ">
                <div class="row mt-3 background-white padding-top-30 border-top-green">
                    <div class="col">
                        @include('layouts.admin.error.list')
                        <form action="{{ route('updateCompanyProfile') }}"  novalidate enctype="application/x-www-form-urlencoded" autocomplete="off" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                            <p>
                                <button type="submit" class="btn btn-primary btn-lg box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> SAVE</button>
                            </p>
                            <div class="border-around-green padding-around-20">
                                @if($info != null )
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Title (*): </label>
                                                <input type="text" class="form-control" name="title" value="{{ $info->title }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="">Nội dung (*): </label>
                                                <textarea name="contentInfo" id="content" class="form-control" rows="10">
                                                {{ $info->content }}
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Title (*): </label>
                                                <input type="text" class="form-control" name="title">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="">Nội dung (*): </label>
                                                <textarea name="contentInfo" id="content" class="form-control" rows="10">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </form>
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
