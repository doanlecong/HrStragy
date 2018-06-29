@extends('layouts.admin')
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    Our Cooperates</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue no-padding-top">
                <div class="row background-white padding-top-30 border-top-green">
                    <div class="col">
                        <p>
                            <a href="{{ route('cooperate.create') }}" class="btn btn-primary box-shadown-darkblue"><i
                                        class="fa fa-list-ol" aria-hidden="true"></i> Add New Cooperate</a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped " style="font-size: 0.8rem;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Image Thumbnail</th>
                                    <th>Image Big</th>
                                    <th>Short Description</th>
                                    <th>Order To Show</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>

                                <tbody id="databody">
                                @if($count > 0)
                                    @foreach ($coops as $t)
                                        <tr id="row{{$t->id}}">
                                            <td>{{ $t->order }}</td>
                                            <td title="{{ strip_tags($t->title)}}">{{ strip_tags(mb_substr($t->title,0, 100))}}</td>
                                            <td>
                                                @if($t->image_small != null && $t->image_small != 'NULL')
                                                    <div>
                                                        <img class="box-shadown-darkblue" src="{{$t->image_small}}"
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
                                                                        <img src="{{ $t->image_small }}"
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
                                            <td>
                                                @if($t->image_big != null && $t->image_big != 'NULL')
                                                    <div>
                                                        <img class="box-shadown-darkblue" src="{{$t->image_big}}"
                                                             data-toggle="modal"
                                                             data-target="#modalShowImageBig{{$t->id}}"
                                                             style="width: 50px; height: 40px;">
                                                        <div class="modal" id="modalShowImageBig{{$t->id}}"
                                                             tabindex="-1" role="dialog"
                                                             aria-labelledby="exampleModalCenterTitle"
                                                             aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg "
                                                                 role="document">
                                                                <div class="modal-content no-border-radius">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">Hình Đại Diện
                                                                            : </h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img src="{{ $t->image_big }}"
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
                                            <td>{{ strip_tags(mb_substr($t->descript,0, 100)) }}</td>

                                            <td>
                                                {{--{{ $t->order }}--}}
                                                @if($count != 1)
                                                    @if($min == $t->order)
                                                        <span><button class="btn btn-primary changeOrder mt-1" title="Move Down"
                                                                      data-href="{{route('cooperate.moveDown',$t->id)}}"><i
                                                                        class="fa fa-arrow-down"></i></button></span>
                                                    @elseif($max == $t->order)
                                                        <span><button class="btn btn-primary changeOrder mt-1" title="Move Up"
                                                                      data-href="{{ route('cooperate.moveUp',$t->id) }}"><i
                                                                        class="fa fa-arrow-up"></i></button></span>
                                                    @else
                                                        <span class="d-inline-block"><button class="btn btn-primary changeOrder mr-1 mt-1" title="Move Up"
                                                                      data-href="{{ route('cooperate.moveUp',$t->id) }}"><i
                                                                        class="fa fa-arrow-up"></i></button> <button
                                                                    class="btn btn-primary mt-1 changeOrder" title="Move Down"
                                                                    data-href="{{ route('cooperate.moveDown', $t->id) }}"><i
                                                                        class="fa fa-arrow-down"></i></button></span>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if($t->status == config('global.statusActive'))
                                                    <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-href="{{ route('cooperate.toggleShow', $t->id) }}" class="badge background-green white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                                                @else
                                                    <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-href="{{ route('cooperate.toggleShow', $t->id) }}" class="badge badge-danger white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $t->created_at->format('F d, Y h:ia') }}</td>
                                            <td>
                                                <button class="btn btn-primary out-line-blue view-service mr-1 mt-1" title="View"
                                                        data-href="{{ route('cooperate.viewInstant',$t->id) }}"><i
                                                            class="fa fa-bolt"></i></button>
                                                <a href="{{ route('cooperate.edit', $t->id) }}"
                                                   class="btn btn-info box-shadown-light-dark mr-1 mt-1"
                                                   style="margin-right: 3px;">Edit</a>
                                                <button title="Delete" class="btn btn-danger box-shadown-light-dark mt-1"
                                                        style="margin-right: 3px;"
                                                        onclick="deleteService('{{ route('cooperate.delete', $t->id) }}', {{ $t->id }})">
                                                    <i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            <h3><i class="fa fa-cube"></i> No Data For Now</h3>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">View Cooperate</h5>
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
        $(document).on('click', '.changeOrder',function () {
            $("#modalShowLoading").modal({
                show: true,
                keyboard : false
            });
            let url = $(this).attr('data-href');
            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    $('#databody').html(data);
                    $('#modalShowLoading').modal('hide');
                },
                error: function (e) {
                    $('#modalShowLoading').modal('hide');
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

                }
            })
        })
    </script>
    <script>
        $(document).on('click', '.toogle-show', function () {
            event.preventDefault();
            console.log('HEHE');
            $("#modalShowLoading").modal({
                show: true,
                keyboard : false
            });
            let url = $(this).attr('data-href');
            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    $('#databody').html(data);
                    $('#modalShowLoading').modal('hide');
                },
                error: function (e) {
                    $('#modalShowLoading').modal('hide');
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
@endsection
