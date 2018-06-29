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
                        <form action="{{ route('updateAboutUs') }}"  novalidate enctype="application/x-www-form-urlencoded" autocomplete="off" method="POST">
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
                                            <label for="">Tên Công Ty : </label>
                                            <input type="text" class="form-control" name="name" value="{{ $info->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Địa chỉ :</label>
                                            <input type="text" class="form-control" name="address" value="{{ $info->address }}" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Điện thoại di động : </label>
                                            <input type="text" class="form-control" name="mobile_phone" value="{{ $info->mobile_phone }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Điện thoại bàn :</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $info->phone }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""><i class="fa fa-facebook"></i> Facebook :</label>
                                            <input type="text" class="form-control" name="facebook" value="{{ $info->facebook }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""><i class="fa fa-linkedin"></i> LinkedIn :</label>
                                            <input type="text" class="form-control" name="linkedin" value="{{ $info->linkedin }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""><i class="fa fa-skype"></i> Skype :</label>
                                            <input type="text" class="form-control" name="skype" value="{{ $info->skype }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""><i class="fa fa-google-plus"></i> Google Plus :</label>
                                            <input type="text" class="form-control" name="google" value="{{ $info->google }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""><i class="fa fa-twitter"></i> Twitter:</label>
                                            <input type="text" class="form-control" name="twitter" value="{{ $info->twitter }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Slogan</label>
                                            <textarea type="text" class="form-control" name="slogan" rows="3" style="resize: vertical; min-height: 100px; max-height: 300px;" readonly>{{ strip_tags($info->slogan) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Thông tin người thanh lập:</label>
                                            <textarea type="text" class="form-control" name="owner_info" rows="3" style="resize: vertical; min-height: 100px; max-height: 300px;" readonly>{{ strip_tags($info->owner_info) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Email công ty :</label>
                                            <input type="text" class="form-control" name="email" value="{{ $info->email }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Ngay Thanh Lập: </label>
                                            <input type="date" class="form-control" name="ngay_thanh_lap" value="{{ date('Y-m-d', strtotime($info->ngay_thanh_lap)) }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Nội dung : </label>
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
                                                <label for="">Tên Công Ty : </label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Địa chỉ :</label>
                                                <input type="text" class="form-control" name="address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Điện thoại di động : </label>
                                                <input type="text" class="form-control" name="mobile_phone">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Điện thoại bàn :</label>
                                                <input type="text" class="form-control" name="phone">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for=""><i class="fa fa-facebook"></i> Facebook :</label>
                                                <input type="text" class="form-control" name="facebook" value="{{ $info->facebook }}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for=""><i class="fa fa-linkedin"></i>LinkedIn :</label>
                                                <input type="text" class="form-control" name="linkedin" value="{{ $info->linkedin }}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for=""><i class="fa fa-skype"></i> Skype :</label>
                                                <input type="text" class="form-control" name="skype" value="{{ $info->skype }}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for=""><i class="fa fa-google-plus"></i> Google Plus :</label>
                                                <input type="text" class="form-control" name="google" value="{{ $info->google }}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for=""><i class="fa fa-twitter"></i> Twitter:</label>
                                                <input type="text" class="form-control" name="twitter" value="{{ $info->twitter }}" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="">Slogan</label>
                                                <textarea type="text" class="form-control" name="slogan" rows="3" style="resize: vertical; min-height: 100px; max-height: 300px;" >

                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="">Thông tin người thanh lập:</label>
                                                <textarea type="text" class="form-control" name="owner_info" rows="3" style="resize: vertical; min-height: 100px; max-height: 300px;">
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Email công ty :</label>
                                                <input type="text" class="form-control" name="email" >
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Ngay Thanh Lập: </label>
                                                <input type="date" class="form-control" name="ngay_thanh_lap">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="">Nội dung : </label>
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
