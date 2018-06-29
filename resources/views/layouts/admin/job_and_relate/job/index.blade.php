@extends('layouts.admin')
@section('script')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    Danh Sách Jobs</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue no-padding-top">
                <div class="row background-white padding-top-30 border-top-green">
                    <div class="col">
                        <p>
                            <span><a href="{{ route('job.create') }}" class="btn btn-primary box-shadown-darkblue"><i
                                            class="fa fa-plus" aria-hidden="true"></i> Add New Job</a></span>
                            <span><a href="{{ route('job_type.index') }}" class="btn btn-primary box-shadown-darkblue"><i
                                            class="fa fa-list-ol" aria-hidden="true"></i> Manage Job Type and Related Stuffs</a></span>
                        </p>
                        <label for="basic-url"><i class="fa fa-search-plus fa-2x mr-2"></i>Search Job</label>
                        <div class="row">
                            <div class="col-sm-4 no-padding-left">
                                <div class="input-group mb-3">
                                    <input type="text" id="name-company" class="form-control" placeholder="Company's name , Job Mame" style="font-size: 0.9rem; padding: 0.42rem 0.5rem; line-height: 1.6">
                                </div>
                            </div>
                            <div class="col-sm-4 no-padding-left">
                                <div class="input-group mb-3">
                                    <select name="type_job" id="type_jobs" class="form-control" multiple>
                                        <option value="">All Categories</option>
                                        @foreach($jobTypes as $jobType)
                                            <option value="{{ $jobType->id }}">{{$jobType->abbr}} -- {{ $jobType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3 no-padding-left">
                                <div class="input-group mb-3">
                                    <select name="type_job" id="provinces" class="form-control" multiple>
                                        <option value="">All Locations</option>
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1 no-padding-left-right">
                                <button class="background-green btn btn-block box-shadown-light-dark btn-search white-text" style="font-size: 0.9rem"><i class="fa fa-search"></i></button></span>
                            </div>

                        </div>

                        <div class="table-responsive" id="contentTable">
                            <table class="table table-hover table-striped " style="font-size: 0.8rem;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Company</th>
                                        <th>Salary</th>
                                        <th>Valid In (From - To)</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody id="databody">
                                @if($count > 0)
                                    @foreach ($jobs as $t)
                                        <tr id="row{{$t->id}}">
                                            <td>{{$t->id}}</td>
                                            <td title="{{ strip_tags($t->job_name)}}">{{ strip_tags(mb_substr($t->job_name,0, 100))}}</td>
                                            <td>
                                                @if($t->image != null && $t->image!= 'NULL')
                                                    <div>
                                                        <img class="box-shadown-darkblue" src="{{$t->image}}"
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
                                                                        <img src="{{ $t->image }}"
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
                                            <td>{{ strip_tags(mb_substr($t->company->name,0, 100)) }}</td>
                                            <td>{{ strip_tags(mb_substr($t->salary, 0, 30)) }}</td>
                                            <td>{{ $t->time_from }} -- {{ $t->time_to }}</td>
                                            <td title="{{ strip_tags($t->description) }}">{{ strip_tags(mb_substr($t->description, 0, 50)) }}</td>
                                            <td id="tdrow{{ $t->id }}">
                                                @if($t->status == config('global.statusActive'))
                                                    <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('job.toggleShow', $t->id) }}" class="badge background-green white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                                                @else
                                                    <span style="cursor: pointer;" title="Click to show or hide this in customer's page" data-id="{{ $t->id }}" data-href="{{ route('job.toggleShow', $t->id) }}" class="badge badge-danger white-text toogle-show box-shadown-light-dark">{{ config('global.'.$t->status) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $t->created_at->format('F d, Y') }}</td>
                                            <td>
                                                <button class="btn btn-primary out-line-blue view-service mr-1 mt-1" title="View"
                                                        data-href="{{ route('job.viewInstant',$t->id) }}"><i
                                                            class="fa fa-bolt"></i></button>
                                                <a href="{{ route('job.edit', $t->id) }}"
                                                   class="btn btn-info box-shadown-light-dark mr-1 mt-1"
                                                   style="margin-right: 3px;">Edit</a>
                                                <button title="Delete" class="btn btn-danger box-shadown-light-dark mt-1"
                                                        style="margin-right: 3px;"
                                                        onclick="deleteService('{{ route('job.delete', $t->id) }}', {{ $t->id }})">
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
                            {{ $jobs->links() }}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('#type_jobs').select2({placeholder : "All Categories"});
        $('#provinces').select2({placeholder: 'All Location'});
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
            let query = getQuery(false);
            console.log(query);
            let currentURL = $(this).attr('href')+query;
            getJsonPaginate(currentURL, e);
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
        $(document).on('click', '.toogle-show', function () {
            event.preventDefault();
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
                    @include('layouts.assessories.handle_error_ajax')
                }
            })
        });
    </script>
    @include('layouts.assessories.debounce')
    <script>
        function getQuery(isQueryFirst = false) {
            let name = $('#name-company').val();
            let type_jobs = $('#type_jobs').val();
            let provinces = $('#provinces').val();
            let query = "";
            if (isQueryFirst) {
                query = "?";
            } else {
                query = "&";
            }
            query += "name="+name;
            for(let index in type_jobs) {
                query+= '&job_types['+index+']='+type_jobs[index];
            }

            for(let index in provinces) {
                query+= '&provinces['+index+']='+provinces[index];
            }
            return query;
        }
        let findData = debounce(function () {
            let query = getQuery(true);
            console.log(query);
            $("#modalShowLoading").modal({
                show: true,
                keyboard : false
            });
            $.ajax({
                url:"{{ route('job.index') }}"+query,
                crossDomain: true,
                async: true,
                type:"GET",
                success:function (data) {
                    $("#modalShowLoading").modal('hide');
                    $('#contentTable').html(data);
                },
                error:function (e) {
                    $("#modalShowLoading").modal('hide');
                    @include('layouts.assessories.handle_error_ajax')
                }
            })

        }, 300);
        $(document).on('click', '.btn-search', function() {
            return findData();
        });
        $(document).on('keypress', '#name-company , #provinces , #type_jobs', function (e) {
            if(e.which == 13) {
                return findData();
            }
        })
    </script>
@endsection
