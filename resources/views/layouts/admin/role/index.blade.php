@extends('layouts.admin')
@section('script')
    <link rel="stylesheet" href="/css/content_post.css">
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Trang Chủ</a></li>
            <li class="breadcrumb-item">Dashboard</li>
        </ol>
    </nav>
@endsection

@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">Dashboard</div>
            <div class="card-body no-padding-left-right padding-top-10 background-blue ">
                <div class="row mt-3 background-white padding-top-30 border-top-green">
                    <div class="col ">
                        <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> My BLOG</h3>
                        <p>
                            <a href="{{ route('mypost.danhsachblog') }}" class="btn btn-primary box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> Danh sách</a>
                            <a href="{{ route('mypost.writepost',['type' => 'blog']) }}" class="btn btn-warning  box-shadown-darkblue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Viết bài mới</a>
                        </p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#topicblog" role="tab"
                                   aria-controls="home" aria-selected="true"><i class="fa fa-list-ol" aria-hidden="true"></i> Chủ đề</a>
                            </li>
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link " id="profile-tab" data-toggle="tab" href="#publicpost"
                                   role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-check-circle" aria-hidden="true"></i>Bài đăng đã xuất bản</a>
                            </li>
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#unpublishblog" role="tab"
                                   aria-controls="profile" aria-selected="false"><i class="fa fa-pause" aria-hidden="true"></i> Bài đang viết dở</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="topicblog" role="tabpanel" aria-labelledby="home-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                                    <div class="loader"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="publicpost" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                                    <div class="loader"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="unpublishblog" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                                    <div class="loader"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row mt-3 background-white padding-top-30 border-top-green">
                    <div class="col ">
                        <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Serie Bài Viết</h3>
                        <p>
                            <a href="{{ route('mypost.danhsachserie') }}" class="btn btn-primary box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> Danh sách</a>
                            <a href="{{ route('mypost.writepost',['type'=>'serie']) }}" class="btn btn-warning  box-shadown-darkblue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Viết bài mới</a>
                        </p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#topicserie" role="tab"
                                   aria-controls="home" aria-selected="true"><i class="fa fa-list-ol" aria-hidden="true"></i> Chủ đề</a>
                            </li>
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link " id="profile-tab" data-toggle="tab" href="#publicserie"
                                   role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-check-circle" aria-hidden="true"></i> Bài đăng đã xuất bản</a>
                            </li>
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#unpublishserie" role="tab"
                                   aria-controls="profile" aria-selected="false"><i class="fa fa-pause" aria-hidden="true"></i> Bài đang viết dở</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="topicserie" role="tabpanel" aria-labelledby="home-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                                    <div class="loader"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="publicserie" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                                    <div class="loader"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="unpublishserie" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10    ">
                                    <div class="loader"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mt-3 background-white padding-top-30 border-top-green">
                    <div class="col ">
                        <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Chuyên Đề</h3>
                        <p>
                            <a href="{{ route('mypost.danhsachchuyende') }}" class="btn btn-primary box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> Danh sách</a>
                            <a href="{{route('mypost.writepost',['type' => 'chuyende'])}}" class="btn btn-warning  box-shadown-darkblue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Viết bài mới</a>
                        </p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#topicchuyende" role="tab"
                                   aria-controls="home" aria-selected="true"><i class="fa fa-list-ol" aria-hidden="true"></i> Chủ đề</a>
                            </li>
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link " id="profile-tab" data-toggle="tab" href="#publicchuyende"
                                   role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-check-circle" aria-hidden="true"></i> Bài đăng đã xuất bản</a>
                            </li>
                            <li class="nav-item box-shadown-darkblue no-border-radius">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#unpublishchuyende" role="tab"
                                   aria-controls="profile" aria-selected="false">Bài đang viết dở</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="topicchuyende" role="tabpanel" aria-labelledby="home-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                                    <div class="loader"></div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="publicchuyende" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10    ">
                                    <div class="loader"></div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="unpublishchuyende" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="wrapper-for-loading padding-top-30 padding-bottom-10    ">
                                    <div class="loader"></div>
                                </div>
                            </div>
                        </div>
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
@section('scriptTail')
    <script>
        function getJsonPaginate(url = "", e) {
            var data = "";
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": (url == "") ? "{{ route('dashboard.getblog') }}" : url,
                "method": "GET",
            }
            $(e.target).closest('table').remove();
            var div = $(e.target).closest('div');
            $(e.target).closest('div').html("<div class=\"wrapper-for-loading padding-top-30 padding-bottom-10\">\n" +
                "                        <div class=\"loader\"></div>\n" +
                "                    </div>");
            // console.log(div);
            $.ajax(settings).done(function (response) {
                div.html(response);
            });
        }

        $(document).ready(function () {
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('dashboard.getblog') }}",
                "method": "GET",
            }).done(function (data) {
                $('#publicpost').html(data);
            });
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('dashboard.getserie') }}",
                "method": "GET",
            }).done(function (data) {
                $('#publicserie').html(data);
            });
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('dashboard.getchuyende') }}",
                "method": "GET",
            }).done(function (data) {
                $('#publicchuyende').html(data);
            });
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('dashboard.gettopicblog') }}",
                "method": "GET",
            }).done(function (data) {
                $('#topicblog').html(data);
            });
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('dashboard.gettopicserie') }}",
                "method": "GET",
            }).done(function (data) {
                $('#topicserie').html(data);
            });
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('dashboard.gettopicchuyende') }}",
                "method": "GET",
            }).done(function (data) {
                $('#topicchuyende').html(data);
            });
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('dashboard.getunblog') }}",
                "method": "GET",
            }).done(function (data) {
                $('#unpublishblog').html(data);
            });
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('dashboard.getunserie') }}",
                "method": "GET",
            }).done(function (data) {
                $('#unpublishserie').html(data);
            });

            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "{{ route('dashboard.getunchuyende') }}",
                "method": "GET",
            }).done(function (data) {
                $('#unpublishchuyende').html(data);
            })
        })
        $(document).on('click', '.pagination .page-item a', function (e) {
            getJsonPaginate($(this).attr('href'), e);
            e.preventDefault();
        });
        $(document).on('click', '.view-now', function (e) {
            // console.log('Helllo');
            var type = $(this).attr('data-type');;
            var id = $(this).attr('data-id');
            $('#contentForPostList').html('<div class="wrapper-for-loading padding-top-30 padding-bottom-10">\n' +
                '                        <div class="loader"></div>\n' +
                '                    </div>');
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "/authorized/view-instance-post/" + type + "/" + id,
                "method": "GET",
            }).done(function (data) {
                $('#contentForPostList').html(data);
                $("pre > code").each(function () {
                    hljs.highlightBlock(this);
                    hljs.lineNumbersBlock(this);
                })
            })
        });
        $(document).on('click','.view-post-list', function (e) {
            $("#modalShowPostList").modal('show');
            var type = $(this).attr('data-type');
            var id = $(this).attr('data-id');
            $('#contentForPostList').html('<div class="wrapper-for-loading padding-top-30 padding-bottom-10">\n' +
                '                        <div class="loader"></div>\n' +
                '                    </div>');
            $.ajax({
                "async": true,
                "crossDomain": true,
                "url": "/authorized/get-list-post/" + type + "/" + id,
                "method": "GET",
            }).done(function (data) {
                $('#contentForPostList').html(data);
            })
        });
    </script>

@endsection