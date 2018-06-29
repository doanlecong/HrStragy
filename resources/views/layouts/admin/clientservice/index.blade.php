@extends('layouts.admin')
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Client Service</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue ">
                <div class="row mt-3 background-white padding-top-30 border-top-green">
                    <div class="col">
                        <p>
                            <a href="{{ route('client_service.create') }}" class="btn btn-primary box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> Create new Client Service</a>
                            <a href="{{ route('type_client_service.index') }}" class="btn btn-primary box-shadown-darkblue"><i class="fa fa-list-ol" aria-hidden="true"></i> Types of Client Service</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped " style="font-size: 0.8rem;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Type Of Service</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($services as $s)
                                    <tr id="row{{$s->id}}">
                                        <td>{{ $s->id }}</td>
                                        <td title="{{ strip_tags($s->title)}}">{{ strip_tags(mb_substr($s->title,0, 100))}}</td>
                                        <td><span class="btn background-green">{{ $s->type->name }}</span></td>
                                        <td>
                                            @if($s->image != null && $s->image != 'NULL')
                                                <div>
                                                    <img class="box-shadown-darkblue" src="{{$s->image}}" data-toggle="modal"
                                                         data-target="#modalShowImage{{$s->id}}" style="width: 50px; height: 40px;">
                                                    <div class="modal" id="modalShowImage{{$s->id}}" tabindex="-1" role="dialog"
                                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
                                                            <div class="modal-content no-border-radius">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Hình Chủ Đề</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{ $s->image }}" style="width: 100%;height: auto;">
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
                                        <td>{{ $s->created_at->format('F d, Y h:ia') }}</td>
                                        <td>
                                            <button class="btn btn-primary out-line-blue view-service" title="View" data-href="{{ route('client_service.viewInstant',$s->id) }}"><i class="fa fa-bolt"></i></button>
                                            <a href="{{ route('client_service.edit', $s->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                                            <button title="Delete" class="btn btn-danger pull-left" style="margin-right: 3px;" onclick="deleteService('{{ route('client_service.delete', $s->id) }}', {{ $s->id }})"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">View OurService</h5>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                                    text: data.msg,
                                    icon: "success",
                                    button: "Đóng thôi !",
                                });
                                var tr = document.getElementById('row' + id);
                                var tbody = tr.parentNode;
                                tbody.removeChild(tr);
                            } else {

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
        $(document).on('click','.view-service', function (e) {
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
@endsection
