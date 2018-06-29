@extends('layouts.admin')
@section('script')
    <link rel="stylesheet" href="/css/content_post.css">
@endsection
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Create User</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue " >
                <div class="row mt-3 background-white padding-top-30 border-top-green" style="min-height: 100vh;">
                    <div class="col">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('user.store') }}" enctype="application/x-www-form-urlencoded" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                            <div class="row padding-around-20 border-around-dash-green-m shadow-lg">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name : </label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email (*) : </label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password (*) : </label>
                                        <input type="text" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Password Confirmation (*) : </label>
                                        <input type="text" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Assign Role :</label>
                                    @foreach ($roles as $role)
                                        <div class="form-check p-1 ml-3">
                                            <label class="form-check-label" style="cursor: pointer;">
                                                <input type="checkbox" class="form-check-input checkbox" name="roles[]" value="{{  $role->id  }}"> {{ ucfirst($role->name) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <button class="btn btn-green btn-block mt-3 text-18 " type="submit" role="button">Create New User</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
