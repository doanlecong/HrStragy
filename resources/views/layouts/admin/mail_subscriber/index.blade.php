@extends('layouts.admin')
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    Danh Sách Mail Subscriber</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue no-padding-top">
                <div class="row background-white padding-top-30 border-top-green">
                    <div class="col">
                        <div class="table-responsive" id="contentTable">
                            <table class="table table-hover table-striped " style="font-size: 0.8rem;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Chuyên Ngành</th>
                                    <th>Location</th>
                                    <th>Created At</th>
                                    <th>Operations</th>
                                </tr>
                                </thead>

                                <tbody id="databody">
                                @if($count > 0)
                                    @foreach ($sub as $t)
                                        <tr id="row{{$t->id}}">
                                            <td>{{$t->id}}</td>
                                            <td title="{{ strip_tags($t->email)}}">{{ strip_tags(mb_substr($t->email,0, 100))}}</td>
                                            <td>{{ $t->jobType->abbr." -- ".strip_tags(mb_substr($t->jobType->name,0, 100)) }}</td>
                                            <td>{{ $t->province->name." -- ".$t->province->country->name }}</td>

                                            <td>{{ $t->created_at->format('F d, Y') }}</td>
                                            <td>
                                                {{--<a href="{{ route('job.createJobForCompany', $t->id) }}" title="Add new job for this Company"--}}
                                                   {{--class="btn background-green white-text box-shadown-light-dark mr-1 mt-1"--}}
                                                   {{--style="margin-right: 3px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>--}}
                                                <button title="Delete" class="btn btn-danger box-shadown-light-dark mt-1"
                                                        style="margin-right: 3px;"
                                                        onclick="deleteService('{{ route('mailsubscriber.delete', $t->id) }}', {{ $t->id }})">
                                                    <i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            <h3 class="green-text"><i class="fa fa-cube"></i> No Data For Now</h3>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            {{ $sub->links() }}
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
                    <h5 class="modal-title" id="exampleModalLongTitle">View Contact Us</h5>
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

@endsection
