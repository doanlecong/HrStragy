@extends('layouts.app')

@section('scriptTop')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container">
        <div class="position-relative padding-around border-top-green">
            <div class="card no-border-radius mb-5">
                <div class="card-header background-light-green">
                    <h3 class="font-playfair green-text text-shadown-orange-thin">
                        <i class="fa fa-user fa-2x mr-2" aria-hidden="true"></i> Dành cho ứng viên
                    </h3>
                </div>
                <div class="card-body">
                    <h5 class="font-playfair ml-3 mb-3" style="line-height: 2rem; "> Should you wish <span class="green-text">HRStragy</span> to help you in career path, please fill full your informations as below.
                        We will turn back you as soon as we got a suitable job for you
                    </h5>
                    <form action="">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Name (*):</span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Phone (*):</span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Email (*):</span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Location (*):</span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Current Position (*):</span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Expected Position (*):</span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Industry (*):</span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Language Skills (*):</span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Current Salary (*):</span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Expected Salary (*):</span>
                                    </div>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Submit Your Qualification & Experience Here :</span>
                                    </div>
                                    <textarea type="text" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Attach Your Profile (*):</span>
                                    </div>
                                    <input type="file" class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <button style="z-index: 1000" class="btn btn-green box-shadown-superdark-green btn-block" type="button">Send Informations</button>
                    </form>
                </div>
            </div>
            <div class="card no-border-radius">
                <div class="card-header background-light-green">
                    <h3 class="font-playfair green-text text-shadown-orange-thin">
                        <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i> Dành cho khách hàng
                    </h3>
                </div>
                <div class="card-body">
                    <h5 class="font-playfair ml-3 mb-3" style="line-height: 2rem; ">
                        Please enter your contact infomation in the contact form below . You can use Unicode Font accented Vietnamese unsigned or to send
                        information to us
                    </h5>
                    <form action="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Full Name (*) :
                                    </label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Phone (*) :
                                    </label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Email (*) :
                                    </label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Address (*) :
                                    </label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">
                                        Title (*) :
                                    </label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">
                                        Content (*) :
                                    </label>
                                    <textarea type="text" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <button style="z-index: 1000" class="btn btn-green box-shadown-superdark-green btn-block" type="button">Send Informations</button>
                        <hr>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('addScript')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#jobsTable').DataTable({
                responsive: {
                    details: false
                }
            });
        })
    </script>
@endsection