@extends('layouts.admin')
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left green-text font-playfair"><i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    Danh Sách Customer Story</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue no-padding-top">
                <div class="row background-white padding-top-30 border-top-green">
                    <div class="col">
                        <p>
                            <a href="{{ route('customer_story.create') }}" class="btn btn-primary box-shadown-darkblue"><i
                                        class="fa fa-list-ol" aria-hidden="true"></i> Add New Story</a>
                        </p>
                        <label for="basic-url"><i class="fa fa-flag-o fa-2x mr-2 green-text "></i>Search Story Base On Title</label>
                        <div class="row">
                            <div class="col-sm-6 no-padding-left">
                                <div class="input-group mb-3">
                                    <input type="text" id="name-company" class="form-control" placeholder="Story's Title" aria-label="Company's name" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><button class="background-green btn btn-block box-shadown-light-dark btn-search"><i class="fa fa-search"></i></button></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive" id="contentTable">
                            <table class="table table-hover table-striped " style="font-size: 0.8rem;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Writer</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>

                                <tbody id="databody">
                                @if($count > 0)
                                    @foreach ($cstories as $t)
                                        <tr id="row{{$t->id}}">
                                            <td>{{$t->id}}</td>
                                            <td title="{{ strip_tags($t->title)}}">{{ strip_tags(mb_substr($t->title,0, 50))}}</td>
                                            <td>
                                                @if($t->image_thumb != null && $t->image_thumb!= 'NULL')
                                                    <div>
                                                        <img class="box-shadown-darkblue" src="{{$t->image_thumb}}"
                                                             data-toggle="modal"
                                                             data-target="#modalShowImage{{$t->id}}"
                                                             style="width: 50px; height: 40px;">
                                                        <div class="modal" id="modalShowImage{{$t->id}}" tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="exampleModalCenterTitle"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg "
                                                                 role="document">
                                                                <div class="modal-content no-border-radius">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Hình Đại Diện
                                                                            :</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img src="{{ $t->image_thumb }}"
                                                                             style="width: 100%;height: auto;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <img src="{{asset('images/empty.png')}}" class="rounded"
                                                         style="width: 50px; height: 50px;">
                                                @endif
                                            </td>
                                            <td>{{ strip_tags(mb_substr($t->description,0, 100)) }}</td>
                                            <td>{{ strip_tags($t->writer) }}</td>
                                            <td id="tdrow{{ $t->id }}">
                                                @if($t->status == config('global.statusActive'))
                                                    <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('customer_story.toggleShow', $t->id) }}" class="badge background-green white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                                                @else
                                                    <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('customer_story.toggleShow', $t->id) }}" class="badge badge-danger white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $t->created_at->format('F d, Y') }}</td>
                                            <td>
                                                <button class="btn btn-primary out-line-blue view-service mr-1 mt-1" title="View"
                                                        data-href="{{ route('customer_story.viewInstant',$t->id) }}"><i
                                                            class="fa fa-bolt"></i></button>
                                                <a href="{{ route('customer_story.edit', $t->id) }}"
                                                   class="btn btn-info box-shadown-light-dark mr-1 mt-1"
                                                   style="margin-right: 3px;">Edit</a>
                                                <button title="Delete" class="btn btn-danger box-shadown-light-dark mt-1"
                                                        style="margin-right: 3px;"
                                                        onclick="deleteService('{{ route('customer_story.delete', $t->id) }}', {{ $t->id }})">
                                                    <i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            <h3 class="white-text"><i class="fa fa-cube"></i> No Data For Now</h3>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            {{ $cstories->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalShowPostList" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1200px;">
            <div class="modal-content no-border-radius">
                <div class="modal-header card_header_gradient">
                    <h5 class="modal-title" id="exampleModalLongTitle">View Story</h5>
                </div>
                <div class="modal-body" id="contentForPostList">
                    <div class="wrapper-for-loading padding-top-30 padding-bottom-10">
                        <div class="loader"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.assessories.modal_loader_bounce')
@endsection

@section('scriptTail')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function getJsonPaginate(url = "", e) {
            var data = "";
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": url,
                "method": "GET",
            }
            $(e.target).closest('table').remove();
            var div = $(e.target).closest('div');
            $(e.target).closest('div').html("<div class=\"wrapper-for-loading padding-top-30 padding-bottom-10\">\n" +
                "                        <div class=\"loader\"></div>\n" +
                "                    </div>");
            // console.log(div);
            $.ajax({
                url: url,
                type: "GET",
                success:function(response) {
                    div.html(response);
                }, error:function (e) {
                    @include('layouts.assessories.handle_error_ajax')
                }
            });
        }
        $(document).on('click', '.pagination .page-item a', function (e) {
            getJsonPaginate($(this).attr('href'), e);
            e.preventDefault();
        });
    </script>
    <script>
        function deleteService(url, id) {
            // event.stopPropagation();
            swal({
                title: "Bạn có thực sự muốn xóa?",
                text: "Một khi xóa thì không thể lấy lại được đâu !!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((value) => {
                if (value) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function (data) {
                            if (data.success == true) {
                                swal({
                                    title: "Success !",
                                    text: data.message,
                                    icon: "success",
                                    button: "Đóng thôi !",
                                });
                                var tr = document.getElementById('row' + id);
                                var tbody = tr.parentNode;
                                tbody.removeChild(tr);
                            }
                        },
                        error: function (e) {
                            if(e.status == 401) {
                                swal({
                                    title: "Opp !",
                                    text: "Your session has been expired . We will redirect you to login page in 3 seconds",
                                    icon: "error",
                                    button: "Đóng thôi !",
                                });
                                setTimeout(function () {
                                    location.reload();
                                }, 3000);
                            } else {
                                swal({
                                    title: "Opp !",
                                    text: e.responseJSON.message,
                                    icon: "error",
                                    button: "Đóng thôi !",
                                });
                            }

                        }
                    })
                } else {
                    swal({
                        title: "Bạn nên cẩn thận hơn để tránh xóa thông tin quan trọng !!",
                        icon: "info",
                        button: "Tắt hộp thoại !",
                        closeOnClickOutside: false
                    });
                }
            })

        }
    </script>
    <script>
        $(document).on('click', '.view-service', function (e) {
            $("#modalShowPostList").modal('show');
            var url = $(this).attr('data-href');
            $('#contentForPostList').html('<div class="wrapper-for-loading padding-top-30 padding-bottom-10">\n' +
                '                        <div class="loader"></div>\n' +
                '                    </div>');
            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    $('#contentForPostList').html(data);
                },
                error: function (e) {
                    $("#modalShowPostList").modal('hide');
                    if(e.status == 401) {
                        swal({
                            title: "Opp !",
                            text: "Your session has been expired . We will redirect you to login page in 3 seconds",
                            icon: "error",
                            button: "Đóng thôi !",
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    }

                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.view-relate-content',function () {
            $("#modalShowPostList").modal({
                show: true
            });
            let url = $(this).attr('data-href');
            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    $('#contentForPostList').html(data);
                },
                error: function (e) {
                    $('#modalShowPostList').modal('hide');
                    console.log(e.status);
                    if(e.status == 401) {
                        swal({
                            title: "Opp !",
                            text: "Your session has been expired . We will redirect you to login page in 3 seconds",
                            icon: "error",
                            button: "Đóng thôi !",
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    }
                    else{
                        swal({
                            title: "Opp !",
                            text: e.responseJSON.message,
                            icon: "error",
                            button: "Đóng thôi !",
                        });
                    }

                }
            })
        })
    </script>
    <script>
        $(document).on('click', '.toogle-show', function (e) {
            e.preventDefault();
            $("#modalShowLoading").modal({
                show: true,
                keyboard : false
            });
            let url = $(this).attr('data-href');
            let id = $(this).attr('data-id');
            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    $('#tdrow'+id).html(data);
                    $('#modalShowLoading').modal('hide');
                },
                error: function (e) {
                    $('#modalShowLoading').modal('hide');
                    if(e.status == 401) {
                        swal({
                            title: "Opp !",
                            text: "Your session has been expired . We will redirect you to login page in 3 seconds",
                            icon: "error",
                            button: "Đóng thôi !",
                        });
                        setTimeout(function () {
                            location.reload();
                        }, 3000);
                    } else {
                        swal({
                            title: "Opp !",
                            text: 'Code : ' + e.status + ' - ' + e.responseJSON.message,
                            icon: "error",
                            button: "Đóng thôi !",
                        });
                    }

                }
            })
        });
    </script>
    @include('layouts.assessories.debounce')
    <script>
        let previousName = "";
        let findData = debounce(function () {
            let name = $('#name-company').val();
            if(previousName != name) {
                previousName = name;
                $("#modalShowLoading").modal({
                    show: true,
                    keyboard : false
                });
                $.ajax({
                    url:"/authenticated/customer_story_search/search?name="+name,
                    crossDomain: true,
                    async: true,
                    type:"GET",
                    success:function (data) {
                        $("#modalShowLoading").modal('hide');
                        $('#name-company').focus();
                        $('#contentTable').html(data);
                    },
                    error:function (e) {
                        $("#modalShowLoading").modal('hide');
                        if(e.status == 401) {
                            swal({
                                title: "Opp !",
                                text: "Your session has been expired . We will redirect you to login page in 3 seconds",
                                icon: "error",
                                button: "Đóng thôi !",
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 3000);
                        } else {
                            swal({
                                title: "Opp !",
                                text: 'Code : ' + e.status + ' - ' + e.responseJSON.message,
                                icon: "error",
                                button: "Đóng thôi !",
                            });
                        }

                    }
                })
            }

        }, 300);
        $(document).on('click', '.btn-search', function() {
            return findData();
        });
        $(document).on('keypress', '#name-company', function (e) {
            if(e.which == 13) {
                return findData();
            }
        })
    </script>
@endsection
