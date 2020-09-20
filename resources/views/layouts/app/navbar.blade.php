<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
    <svg class="c-icon c-icon-lg">
        <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-menu')}}"></use>
    </svg>
</button>
<a class="c-header-brand d-lg-none" href="#">
    <img src="{{asset('assets/koan-LOGO-bw.png')}}" class="" width="46" height="46" alt="KOAN Logo">
</a>
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
    <svg class="c-icon c-icon-lg">
        <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-menu')}}"></use>
    </svg>
</button>
<ul class="c-header-nav d-md-down-none">
    @auth
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="/users/{{ Auth::user()->koan_users_id ?? 'here-should-be-some-unique-id' }}/details">{{ Auth::user()->name ?? 'User' }}</a></li>

    @if(Auth::user()->access_level === 1)
    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="/users/dashboard">Users</a></li>
    @endif

    @endauth
</ul>
<ul class="c-header-nav ml-auto mr-4">
{{--    <li class="c-header-nav-item d-md-down-none mx-2">--}}
{{--        <a class="c-header-nav-link" href="#">--}}
{{--            <svg class="c-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-bell')}}"></use>--}}
{{--            </svg>--}}
{{--        </a>--}}
{{--    </li>--}}

    <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="c-avatar"><img class="c-avatar-img" src="{{asset('assets/person.png')}}" alt="user@email.com"></div>
{{--            <div class="c-avatar">--}}
{{--                <svg class="c-icon mr-2">--}}
{{--                    <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-user')}}"></use>--}}
{{--                </svg>--}}
{{--            </div>--}}
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">
{{--            <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>--}}
{{--            <a class="dropdown-item" href="#">--}}
{{--                <svg class="c-icon mr-2">--}}
{{--                    <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-bell')}}"></use>--}}
{{--                </svg> Updates<span class="badge badge-info ml-auto">42</span>--}}
{{--            </a>--}}
{{--            <a class="dropdown-item" href="#">--}}
{{--                <svg class="c-icon mr-2">--}}
{{--                    <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-envelope-open')}}"></use>--}}
{{--                </svg> Messages<span class="badge badge-success ml-auto">42</span>--}}
{{--            </a>--}}
{{--            <a class="dropdown-item" href="#">--}}
{{--                <svg class="c-icon mr-2">--}}
{{--                    <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-task')}}"></use>--}}
{{--                </svg> Tasks<span class="badge badge-danger ml-auto">42</span>--}}
{{--            </a>--}}
{{--            <a class="dropdown-item" href="#">--}}
{{--                <svg class="c-icon mr-2">--}}
{{--                    <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-comment-square')}}"></use>--}}
{{--                </svg> Comments<span class="badge badge-warning ml-auto">42</span>--}}
{{--            </a>--}}
            <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div>
            @auth
            <a class="dropdown-item" href="/users/{{Auth::user()->koan_users_id}}/details">
                <svg class="c-icon mr-2">
                    <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-user')}}"></use>
                </svg>
                Profile
            </a>
            @endauth
            <div class="dropdown-divider"></div>
{{--            <a class="dropdown-item" href="#">--}}
{{--                <svg class="c-icon mr-2">--}}
{{--                    <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-lock-locked')}}"></use>--}}
{{--                </svg> Lock Account--}}
{{--            </a>--}}
            <a class="dropdown-item" href="/logout">
                <svg class="c-icon mr-2">
                    <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-account-logout')}}"></use>
                </svg> Logout
            </a>
        </div>
    </li>
</ul>
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Admin</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
