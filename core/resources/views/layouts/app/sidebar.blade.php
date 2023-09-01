{{--@section('sidebar')--}}
{{--    This is the master sidebar.--}}
{{--@show--}}

<div class="c-sidebar-brand d-lg-down-none">
    <img src="{{asset('assets/koan-LOGO-bw.png')}}" class="c-sidebar-brand-full" width="46" height="46" alt="KOAN Logo">
{{--        <use xlink:href="{{asset('assets/brand/coreui.svg#full')}}"></use>--}}
{{--        <use xlink:href="{{asset('assets/koan-LOGO-bw.png')}}"></use>--}}
    <img src="{{asset('assets/koan-LOGO-bw.png')}}" class="c-sidebar-brand-minimized" width="46" height="46" alt="KOAN Logo">
{{--        <use xlink:href="{{asset('assets/brand/coreui.svg#signet')}}"></use>--}}
</div>
<ul class="c-sidebar-nav">



    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="/">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-speedometer')}}"></use>
            </svg> Dashboard
        </a>
    </li>


    @auth
    @if(Auth::user()->access_level === 1)
    <li class="c-sidebar-nav-title">OAUTH</li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="/clients">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-speedometer')}}"></use>
            </svg> Clients
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="/authorized_clients">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-lock-unlocked')}}"></use>
            </svg> Authorized Clients
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="/personal_access_tokens">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-speedometer')}}"></use>
            </svg> Personal Access Tokens
        </a>
    </li>
    @endif
    @endauth

    @auth
    <li class="c-sidebar-nav-title">Accounts</li>
    @if(Auth::user()->access_level === 1)
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-people')}}"></use>
            </svg> Users</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/users/dashboard"><span class="c-sidebar-nav-icon"></span> Dashboard</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/users/new"><span class="c-sidebar-nav-icon"></span> New User</a></li>
        </ul>
    </li>
    @endif
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-user')}}"></use>
            </svg> {{Auth::user()->name}}</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/users/{{Auth::user()->koan_users_id}}/details"><span class="c-sidebar-nav-icon"></span> Details</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/users/{{Auth::user()->koan_users_id}}/edit"><span class="c-sidebar-nav-icon"></span> Edit Details</a></li>
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/users/{{Auth::user()->koan_users_id}}/password/change"><span class="c-sidebar-nav-icon"></span> Change Password</a></li>--}}
        </ul>
    </li>
    @endauth





{{--    <li class="c-sidebar-nav-title">Theme</li>--}}
{{--    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="colors.html">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-drop')}}"></use>--}}
{{--            </svg> Colors</a></li>--}}
{{--    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="typography.html">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-pencil')}}"></use>--}}
{{--            </svg> Typography</a></li>--}}
{{--    <li class="c-sidebar-nav-title">Components</li>--}}
{{--    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-puzzle')}}"></use>--}}
{{--            </svg> Base</a>--}}
{{--        <ul class="c-sidebar-nav-dropdown-items">--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/cards.html"><span class="c-sidebar-nav-icon"></span> Cards</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/carousel.html"><span class="c-sidebar-nav-icon"></span> Carousel</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/collapse.html"><span class="c-sidebar-nav-icon"></span> Collapse</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/forms.html"><span class="c-sidebar-nav-icon"></span> Forms</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/jumbotron.html"><span class="c-sidebar-nav-icon"></span> Jumbotron</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/list-group.html"><span class="c-sidebar-nav-icon"></span> List group</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/navs.html"><span class="c-sidebar-nav-icon"></span> Navs</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/pagination.html"><span class="c-sidebar-nav-icon"></span> Pagination</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/popovers.html"><span class="c-sidebar-nav-icon"></span> Popovers</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/progress.html"><span class="c-sidebar-nav-icon"></span> Progress</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/scrollspy.html"><span class="c-sidebar-nav-icon"></span> Scrollspy</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/switches.html"><span class="c-sidebar-nav-icon"></span> Switches</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tables.html"><span class="c-sidebar-nav-icon"></span> Tables</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tabs.html"><span class="c-sidebar-nav-icon"></span> Tabs</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/tooltips.html"><span class="c-sidebar-nav-icon"></span> Tooltips</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-cursor')}}"></use>--}}
{{--            </svg> Buttons</a>--}}
{{--        <ul class="c-sidebar-nav-dropdown-items">--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/buttons.html"><span class="c-sidebar-nav-icon"></span> Buttons</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/button-group.html"><span class="c-sidebar-nav-icon"></span> Buttons Group</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/dropdowns.html"><span class="c-sidebar-nav-icon"></span> Dropdowns</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="buttons/brand-buttons.html"><span class="c-sidebar-nav-icon"></span> Brand Buttons</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="charts.html">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-chart-pie')}}"></use>--}}
{{--            </svg> Charts</a></li>--}}
{{--    <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-star')}}"></use>--}}
{{--            </svg> Icons</a>--}}
{{--        <ul class="c-sidebar-nav-dropdown-items">--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-free.html"> CoreUI Icons<span class="badge badge-success">Free</span></a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-brand.html"> CoreUI Icons - Brand</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="icons/coreui-icons-flag.html"> CoreUI Icons - Flag</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-bell')}}"></use>--}}
{{--            </svg> Notifications</a>--}}
{{--        <ul class="c-sidebar-nav-dropdown-items">--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/alerts.html"><span class="c-sidebar-nav-icon"></span> Alerts</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/badge.html"><span class="c-sidebar-nav-icon"></span> Badge</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="notifications/modals.html"><span class="c-sidebar-nav-icon"></span> Modals</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="widgets.html">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-calculator')}}"></use>--}}
{{--            </svg> Widgets<span class="badge badge-info">NEW</span></a></li>--}}
{{--    <li class="c-sidebar-nav-divider"></li>--}}
{{--    <li class="c-sidebar-nav-title">Extras</li>--}}
{{--    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-star')}}"></use>--}}
{{--            </svg> Pages</a>--}}
{{--        <ul class="c-sidebar-nav-dropdown-items">--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="login.html" target="_top">--}}
{{--                    <svg class="c-sidebar-nav-icon">--}}
{{--                        <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-account-logout')}}"></use>--}}
{{--                    </svg> Login</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="register.html" target="_top">--}}
{{--                    <svg class="c-sidebar-nav-icon">--}}
{{--                        <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-account-logout')}}"></use>--}}
{{--                    </svg> Register</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="404.html" target="_top">--}}
{{--                    <svg class="c-sidebar-nav-icon">--}}
{{--                        <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-bug')}}"></use>--}}
{{--                    </svg> Error 404</a></li>--}}
{{--            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="500.html" target="_top">--}}
{{--                    <svg class="c-sidebar-nav-icon">--}}
{{--                        <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-bug')}}"></use>--}}
{{--                    </svg> Error 500</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--    <li class="c-sidebar-nav-item mt-auto"><a class="c-sidebar-nav-link c-sidebar-nav-link-success" href="https://coreui.io" target="_top">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-cloud-download')}}"></use>--}}
{{--            </svg> Download CoreUI</a></li>--}}
{{--    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-sidebar-nav-link-danger" href="https://coreui.io/pro/" target="_top">--}}
{{--            <svg class="c-sidebar-nav-icon">--}}
{{--                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-layers')}}"></use>--}}
{{--            </svg> Try CoreUI<strong>PRO</strong></a></li>--}}
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
