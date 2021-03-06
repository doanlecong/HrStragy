@extends('layouts.admin')
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Chỉnh sửa Company</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue no-padding-top">
                <div class="row  background-white padding-top-30 border-top-green">
                    <div class="col">
                        @include('layouts.admin.error.list')
                        <form action="{{ route('company_job.update', $comp->id) }}" novalidate enctype="application/x-www-form-urlencoded" autocomplete="off" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <p>
                                <button type="submit" class="btn btn-primary btn-lg box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> SAVE</button>
                            </p>
                            <div class="border-around-green padding-around-20">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">Tên Company: </label>
                                            <input type="text" class="form-control" name="name" value="{{ $comp->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email: </label>
                                            <input type="email" class="form-control" name="email" value="{{ $comp->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone: </label>
                                            <input type="tel" class="form-control" name="phone" value="{{ $comp->phone }}">
                                        </div>

                                        <label for="image">Image </label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="image" data-preview="holder_1"
                                                   class="btn btn-primary text-light box-shadown-superdarkblue">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="image" class="form-control" type="text" name="image" value="{{ $comp->image }}">
                                        </div>
                                        <img id="holder_1" style="margin-top:15px;max-height:100px;" src="{{ $comp->image }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description">Mô tả ngắn:  </label>
                                            <textarea type="text" class="form-control" name="description" rows="3" style="resize: vertical; max-height: 200px;">{{ strip_tags($comp->description) }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Địa Chỉ :  </label>
                                            <textarea type="text" class="form-control" name="address" rows="3" style="resize: vertical; max-height: 200px;">{{ strip_tags($comp->address) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Nội dung : </label>
                                            <textarea name="contentInfo" id="content" class="form-control" rows="10">{{ $comp->content }}</textarea>
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
    <script>
        var editor_config = {
            path_absolute: "",
            selector: "textarea[id=content]",
            theme: 'modern',
            plugins: 'print preview searchreplace emoticons autolink ' +
            'directionality codesample visualblocks visualchars fullscreen ' +
            'image link media template codesample  code table charmap hr pagebreak ' +
            'nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount ' +
            'imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | emoticons | fontsizeselect | fontselect ',// fontselect
            image_advtab: true,
            templates: [
                {title: 'Website Template', content: 'Test 1'},
                {title: 'Mobile Template', content: 'Test 2'},
                {title: 'Logo Template', content: 'Test 3'}
            ],
            codesample_languages: [
                {text: 'HTML/XML', value: 'markup'},
                {text: 'JavaScript', value: 'javascript'},
                {text: 'CSS', value: 'css'},
                {text: 'PHP', value: 'php'},
                {text: 'Ruby', value: 'ruby'},
                {text: 'Python', value: 'python'},
                {text: 'Java', value: 'java'},
                {text: 'C', value: 'c'},
                {text: 'C#', value: 'csharp'},
                {text: 'C++', value: 'cpp'},
                {text: "jsx", value: "jsx"},
                {text: "JSON", value: "json"}
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,700,900,900i&amp;subset=vietnamese',
                '//fonts.googleapis.com/css?family=Lobster&amp;subset=vietnamese',
                '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,900&amp;subset=vietnamese',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            font_formats:  'Roboto=roboto, avant garde cursive times; Playfair=playfair display , serif ;Lobster=lobster, cursive ; Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',
            relative_urls: false,
            height: 600,
            allow_script_urls: true,
            file_browser_callback: function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
        // $('#lfm2').filemanager('file', {prefix: route_prefix});
    </script>
@endsection
