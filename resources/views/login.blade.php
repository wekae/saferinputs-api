<html lang="en">
<head>
    <title>Safe Inputs API -  @yield('title')</title>
    @component('layouts.app.header')

    @endcomponent
</head>
<body class="c-app">

{{--<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">--}}
{{--    @component('layouts.app.sidebar')--}}
{{--    @endcomponent--}}
{{--</div>--}}
<div class="c-wrapper c-fixed-components">
{{--    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">--}}
{{--        @component('layouts.app.navbar')--}}
{{--        @endcomponent--}}
{{--    </header>--}}
    <div class="c-body">
        <main class="c-main">
            <form method="post" action="/auth">
                @csrf
{{--                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"/>--}}
                <div class="container-fluid">
                    @component('layouts.app.notifications')

                    @endcomponent
{{--                    <div style="height: 85vh; width:100%; display: flex; flex-direction: row; align-items: center; ">--}}
{{--                        <div style="width:100%; display:flex; flex-direction:column; align-items: center;">--}}
                    <div style="height: 75vh; width:100%; display: flex; flex-direction: column; justify-content: center; align-content: center;">
                        <div style="">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card-group">
                                        <div class="card p-4">
                                            <div class="card-body">
                                                <h1>API Login</h1>
                                                <p class="text-muted">Sign In to your account</p>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                  <svg class="c-icon">
                                                    <use xlink:href="assets/icons/sprites/free.svg#cil-user"></use>
                                                  </svg></span></div>
                                                    <input class="form-control" required name="email" type="email" placeholder="Email">
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend"><span class="input-group-text">
                                                  <svg class="c-icon">
                                                    <use xlink:href="assets/icons/sprites/free.svg#cil-lock-locked"></use>
                                                  </svg></span></div>
                                                    <input class="form-control" required name="password" type="password" placeholder="Password">
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button class="btn btn-primary px-4" type="submit">Login</button>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card text-white py-5 d-md-down-none" style="width:100%; background-color: rgb(255,255,255);">
                                            <div class="card-body text-center"  style="width: 100%;  background: url('{{asset("assets/web-img/undraw_authentication_fsn5.png")}}'); background-position:center; background-size: contain; background-repeat: no-repeat;">
                                                <div>
                                                    {{--                                                <h2>KOAN API</h2>--}}
                                                    {{--                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
                                                    {{--                                                <button class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</button>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
        <footer class="c-footer">
            @component('layouts.app.footer')
            @endcomponent
        </footer>
    </div>
</div>
@component('layouts.app.scripts')
@endcomponent

</body>
</html>





