{{--<html lang="en">--}}
<html lang="{{app()->getLocale()}}">
<head>
    <title>Safer Inputs API -  @yield('title')</title>
    @component('layouts.app.header')
    @endcomponent
</head>
<body class="c-app">

<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    @component('layouts.app.sidebar')
    @endcomponent
</div>
<div class="c-wrapper c-fixed-components">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        @component('layouts.app.navbar')
        @endcomponent
    </header>
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">
                    @yield('content')
                </div>
            </div>
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
