@extends('layouts.app')

@section('scriptTop')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection

@section('title')
    {{ "HR Strategy Co., Ltd | Công ty TNHH Chiến Lược Nhân Lực _ Providing: ESS Service, Headhunter Service, Training Service, Human Capital Consultancy, Outsourcing & Staffing Services, MC Service,Cung cấp Dịch vụ tuyển dụng, đào tạo, tư vấn, thuê ngoài nhân lực, dịch vụ cung cấp MC " }}
@endsection
@section('content')
    <div class="container">
        <div>
            <h1 class="mt-5 mb-5 ml-3 green-text text-uppercase font-playfair text-shadown-black">Recruitment Service Job Posting</h1>
            <div class="row mb-5">
                <div class="col-sm-12 col-md-9">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-5">
                            <input type="text" class="form-control" placeholder="Keywords">
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <select name="" id="" class="form-control">
                                <option value="">IT</option>
                                <option value="">Civil</option>
                                <option value="">Chemistry</option>
                                <option value="">Aero</option>
                                <option value="">Electrical</option>
                                <option value="">Art</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <select name="`" id="" class="form-control">
                                <option value="">Hà Nôi</option>
                                <option value="">Hồ Chí Minh</option>
                                <option value="">Long An</option>
                                <option value="">Cần Thơ</option>
                                <option value="">Đồng Nai</option>
                            </select>
                        </div>
                    </div>
                    <table class="table table-hover table-striped" id="jobsTable">
                        <thead>
                        <th scope="col">Job Title</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Location</th>
                        <th scope="col">Date Posted</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr><tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr><tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr><tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr><tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr><tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        <tr>
                            <td>AJBSBSKS</td>
                            <td>22536$ -100000$</td>
                            <td>Mars</td>
                            <td>01/01/2099</td>
                        </tr>
                        </tbody>
                    </table>
                    <h5 class="text-right">
                        <a href="#" class="animate-bottom-nocontent green-text">View More</a>
                    </h5>
                </div>

                <div class="col-md-3">
                    <h3 class="font-weight-bold">ĐỊA ĐIỂM</h3>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Hồ Chí Mính
                        </label>
                    </p>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Hà Nội
                        </label>
                    </p>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Bình Dương
                        </label>
                    </p>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Đồng Nai
                        </label>
                    </p>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Long An
                        </label>
                    </p>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Hải Phòng
                        </label>
                    </p>
                    <p>
                        <a href="#" class="animate-bottom-nocontent text-primary">Xem thêm</a>
                    </p>

                    <hr>
                    <h3 class="font-weight-bold">NGÀNH NGHỀ</h3>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Bán Hàng / Kình Doanh
                        </label>
                    </p>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Tiếp thị / Maketing
                        </label>
                    </p>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Ngân Hàng
                        </label>
                    </p>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Dịch Vụ Khách Hàng
                        </label>
                    </p>
                    <p>
                        <label for="">
                            <input type="checkbox" name=""> Tài Chính Đầu Tư
                        </label>
                    </p>

                    <a href="#" class="animate-bottom-nocontent text-primary">Xem thêm</a>

                </div>
            </div>
        </div>
        <div class="position-relative padding-around background-light-green">
            <div class="row">
                <div class="col-12">
                    <h4 class="font-playfair">
                        Should you wish <span class="font-weight-bold">HRStragy</span> to help you in career path, please fill full your informations as below.
                        We will turn back you as soon as we got a suitable job for you
                    </h4>
                </div>
            </div>

            <form action="">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">
                                Name (*) :
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
                                Location (*) :
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">
                                Current Position (*) :
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">
                                Expected Position (*) :
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">
                                Industry (*) :
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">
                                Language Skills (*) :
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">
                                Current Salary (*) :
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">
                                Expected Salary (*) :
                            </label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">
                                Expected Salary (*) :
                            </label>
                            <textarea type="text" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">
                                Expected Salary (*) :
                            </label>
                            <input type="file" class="form-control-file">
                        </div>
                    </div>
                </div>
                <button style="z-index: 1000" class="btn btn-green box-shadown-superdark-green btn-block" type="button">Send Informations</button>
                <hr>
            </form>
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