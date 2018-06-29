@extends('layouts.admin')
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Chỉnh sửa Story</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue no-padding-top">
                <div class="row  background-white padding-top-30 border-top-green">
                    <div class="col">
                        @include('layouts.admin.error.list')
                        <form action="{{ route('customer_story.update', $custStory->id) }}" novalidate enctype="application/x-www-form-urlencoded" autocomplete="off" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <p>
                                <button type="submit" class="btn btn-primary btn-lg box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> SAVE</button>
                            </p>
                            <div class="border-around-green padding-around-20">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Title: </label>
                                            <input type="text" class="form-control" name="title" autofocus value="{{ $custStory->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Writer: </label>
                                            <input type="email" class="form-control" name="writer" value="{{ $custStory->writer }}">
                                        </div>
                                        <label for="image">Image : </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="image" data-preview="holder_1"
                                                   class="btn btn-primary text-light box-shadown-superdarkblue">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="image" class="form-control" type="text" name="image_thumb" value="{{ $custStory->image_thumb }}">
                                        </div>
                                        <img id="holder_1" style="margin-top:15px;max-height:100px;" src="{{ $custStory->image_thumb }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description">Mô tả ngắn:  </label>
                                            <textarea type="text" class="form-control" name="description" rows="9" style="resize: vertical; max-height: 200px;">{{ strip_tags($custStory->description) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Nội dung : </label>
                                            <textarea name="contentInfo" id="content" class="form-control" rows="10">{{ $custStory->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptTail')
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
