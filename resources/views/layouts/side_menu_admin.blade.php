<div class="d-block">
    <img src="{{ asset('images/Logo.png') }}" class="image-full-width logo-image">
</div>
<div class="d-block">
    <?php $currentUser = auth()->user() ?>
    @if($currentUser->hasRole(config('global.admin')))
        <button class="padding-around-20 padding-left-5 accordion-button white-text btn text-left background-gradient-cyan-plum no-border-radius border-left-green-m btn-block box-shadown-light-dark" href="#"><i class="fa fa-tachometer"></i> Quan ly nguoi dung</button>
        <div class="accordion_content">
                {{--<a href="{{ route('dashboard') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Dashboard</a>--}}
            <a href="{{ route('user.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Users</a>
            {{--<a href="{{ route('role.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Roles</a>--}}
            {{--<a href="{{ route('permission.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Permission</a>--}}
        </div>
    @endif
    @if($currentUser->hasRole(config('global.cooperate_company_info')) || $currentUser->hasRole(config('global.admin')))
        <button class=" padding-around-20 padding-left-5 accordion-button white-text text-left btn background-gradient-cyan-plum no-border-radius btn-block border-left-green-m box-shadown-light-dark mt-2" href="#"><i class="fa fa-tachometer"></i> Quan ly Contact , Company Info</button>
        <div class="accordion_content">
            <a href="{{ route('viewAboutUs') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> View Company Info</a>
        </div>

        <button class=" padding-around-20 padding-left-5 accordion-button white-text text-left btn background-gradient-cyan-plum no-border-radius btn-block border-left-green-m box-shadown-light-dark mt-2" href="#"><i class="fa fa-tachometer"></i> Quản Lý Cooperate</button>
        <div class="accordion_content">
            <a href="{{ route('cooperate.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Danh Sach Cooperate</a>
        </div>
    @endif

    @if($currentUser->hasRole(config('global.story_service')) || $currentUser->hasRole(config('global.admin')))
        <button class=" padding-around-20 padding-left-5 accordion-button white-text text-left btn background-gradient-cyan-plum no-border-radius btn-block border-left-green-m box-shadown-light-dark mt-2" href="#"><i class="fa fa-tachometer"></i> Quan Ly Service</button>
        <div class="accordion_content">
            <a href="{{ route('our_service.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Our Service</a>
            <a href="{{ route('client_service.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Client Service</a>
        </div>

        <button class=" padding-around-20 padding-left-5 accordion-button white-text text-left btn background-gradient-cyan-plum no-border-radius btn-block border-left-green-m box-shadown-light-dark mt-2" href="#"><i class="fa fa-tachometer"></i> Customer Stories</button>
        <div class="accordion_content">
            <a href="{{ route('customer_story.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Customer Stories</a>
        </div>
    @endif

    @if($currentUser->hasRole(config('global.admin')) || $currentUser->hasRole(config('global.job_company_location')))
        <button class=" padding-around-20 padding-left-5 accordion-button white-text text-left btn background-gradient-cyan-plum no-border-radius btn-block border-left-green-m box-shadown-light-dark mt-2" href="#"><i class="fa fa-tachometer"></i> Quản Lý Job, Company, Location</button>
        <div class="accordion_content">
            <a href="{{ route('job.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Danh Sach Job</a>
            <a href="{{ route('company_job.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Danh Sach Company's Job</a>
            <a href="{{ route('country.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Danh Sach Location</a>
        </div>
    @endif

    @if($currentUser->hasRole(config('global.candidate_guest')) || $currentUser->hasRole(config('global.admin')))
        <button class=" padding-around-20 padding-left-5 accordion-button white-text text-left btn background-gradient-cyan-plum no-border-radius btn-block border-left-green-m box-shadown-light-dark mt-2" href="#"><i class="fa fa-tachometer"></i> Quản Lý Liên Hệ</button>
        <div class="accordion_content">
            <a href="{{ route('candidates.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Danh Sach Ứng Viên</a>
            <a href="{{ route('guest_contact.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Danh Sach Khách Hàng</a>

        </div>
    @endif

    @if($currentUser->hasRole(config('global.mail_sub_contact_us')) || $currentUser->hasRole(config('global.admin')))
        <button class=" padding-around-20 padding-left-5 accordion-button white-text text-left btn background-gradient-cyan-plum no-border-radius btn-block border-left-green-m box-shadown-light-dark mt-2" href="#"><i class="fa fa-tachometer"></i> Quản Lý Đăng Ký Nhận Mail</button>
        <div class="accordion_content">
            <a href="{{ route('contactus.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Danh Sach Liên Hệ</a>
            <a href="{{ route('mailsubscriber.index') }}" class="btn btn-primary border-left-purple-thin btn-block text-left box-shadown-darkblue" ><i class="fa fa-tasks"></i> Danh Sách Nhận Mail</a>
        </div>
    @endif
</div>
