<nav class="navbar navbar-expand-lg navbar-light background-gradient-purple text-light top-nav-admin sticky-top">
    <span style="font-size:30px;cursor:pointer"  class="button-menu-side" onclick="toggleNav()">&#9776;</span>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mr-0 top-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('homepage') }}">User's Page <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->name }}
                    @if(auth()->user()->hasRole(config('global.admin')))
                        &nbsp;Administrator
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background: #4df3895e">
                    {{--<a class="dropdown-item" href="#">Action</a>--}}
                    <a class="dropdown-item" href="{{ route('change_info.password') }}">Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
