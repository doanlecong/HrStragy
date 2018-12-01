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
                        <label for="basic-url"><i class="fa fa-flag-o fa-2x mr-2 green-text "></i>Search (<small>***</small>)</label>
                        <div class="row">
                            <div class="col-sm-2 form-group">
                                <input type="text" class="form-control" name="email_contact" id="email_contact" placeholder="Email">
                            </div>
                            <div class="col-sm-2 form-group">
                                <select name="location_contact" id="location_contact" class="form-control">
                                    <option value="">All Location</option>
                                </select>
                            </div>
                            <div class="col-sm-3 form-group">
                                <select name="industry_contact" id="industry_contact" class="form-control">
                                    <option value="">All Industry</option>
                                </select>
                            </div>
                            <div class="col-sm-1 form-group no-padding-left-right">
                                <button class="btn btn-primary btn-group mr-1 mt-1" id="btn-search"><i class="fa fa-search"></i></button>
                                <button class="btn btn-warning btn-group mr-1 mt-1" id="btn-clear"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
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
                                            <td>{{ !empty($t->jobType) ? $t->jobType->abbr." -- ".strip_tags(mb_substr($t->jobType->name,0, 100)) : ''}}</td>
                                            <td>{{ !empty($t->province) ? $t->province->name." -- ".(!empty($t->province->country) ? $t->province->country->name : '')  : ''   }}</td>

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
        let industriesUrl = '{{ route('candidate.industries') }}';
        let locationUrl   = '{{ route('candidate.locations') }}';
        $(document).ready(function() {
            let locationSelect = $('#location_contact');
            let industrySelect = $('#industry_contact');
            $.ajax({
                url: locationUrl,
                type: "GET",
                success:function(response) {
                    if(response.success === true && response.data.length > 0) {
                        let data = response.data;
                        data.forEach((item) => {
                            let option = '<option value="'+item.id+'">'+item.name+ ' - '+item.country_name+'</option>';
                            locationSelect.append(option);
                        });
                    }
                }, error:function (e) {
                    @include('layouts.assessories.handle_error_ajax')
                }
            });
            $.ajax({
                url: industriesUrl,
                type: "GET",
                success:function(response) {
                    if(response.success === true && response.data.length > 0) {
                        let data = response.data;
                        data.forEach(item => {
                            let option = '<option value="'+item.id+'">'+item.abbr+' - '+item.name +'</option>';
                            industrySelect.append(option);
                        });
                    }
                }, error:function (e) {
                    @include('layouts.assessories.handle_error_ajax')
                }
            });
        })

    </script>
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
    @include('layouts.assessories.debounce')
    <script>
        let findData = debounce(function () {
            let email = $('#email_contact').val();
            let location = $('#location_contact').val();
            let industry = $('#industry_contact').val();
            $("#modalShowLoading").modal({
                show: true,
                keyboard : false
            });
            let currentUrl = '{{ route('mailsubscriber.search') }}';
            currentUrl += '?email='+ email;
            currentUrl += '&location='+location;
            currentUrl += '&industry='+industry;

            $.ajax({
                url: currentUrl,
                crossDomain: true,
                async: true,
                type:"GET",
                success:function (data) {
                    // console.log(data);
                    $("#modalShowLoading").modal('hide');
                    $('#contentTable').html(data);
                    {{--if(isChangeStatus) {--}}
                    {{--let button = $('.filterStatusData');--}}
                    {{--if(currentStatus == 'Y') {--}}
                    {{--button.html('{{config('global.readY')}}');--}}
                    {{--} else if(currentStatus == 'N') {--}}
                    {{--button.html('{{ config('global.readN') }}');--}}
                    {{--}--}}
                    {{--}--}}
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

        }, 300);
        $(document).on('click', '#btn-search', function() {
            return findData();
        });
    </script>
@endsection
