@extends('layouts.admin')
@section('script')
    <link rel="stylesheet" href="/css/content_post.css">
@endsection
@section('contentAdmin')
    <div class="col-lg no-padding-left-right">
        <div class="card card-no-border">
            <div class="card-header card_header_gradient no-border-radius">
                <h3 class="text-left orange-text font-roboto-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Edit User</h3>
            </div>
            <div class="card-body no-padding-left-right background-blue ">
                <div class="row mt-3 background-white padding-top-30 border-top-green">
                    <div class="col">
                        <form action="{{ route('user.update',$user->id) }}" enctype="application/x-www-form-urlencoded" method="POST">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name : </label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email (*) : </label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="">Assign Role :</label>
                                    <?php
                                        $userRoleIds = [];
                                        foreach ($user->roles as $role) {
                                            $userRoleIds[] = $role->id;
                                        }
                                    ?>
                                    @foreach ($roles as $role)
                                        <div class="form-check">
                                            <label class="form-check-label" style="cursor: pointer;">
                                                @if(in_array($role->id, $userRoleIds))
                                                    <input type="checkbox" class="form-check-input checkbox" name="roles[]" checked value="{{$role->id}}"> {{ ucfirst($role->name) }}
                                                @else
                                                    <input type="checkbox" class="form-check-input checkbox" name="roles[]" value="{{$role->id }}"> {{ ucfirst($role->name) }}
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password">Password (*) : </label>
                                        <input type="text" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Password Confirmation(*) : </label>
                                        <input type="text" class="form-control" name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-green btn-block mt-3" type="submit" role="button">Edit User</button>
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
