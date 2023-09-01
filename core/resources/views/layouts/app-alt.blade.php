{{--<html lang="en">--}}
<html lang="{{app()->getLocale()}}">
<head>
    <title>Safer Inputs API -  @yield('title')</title>
    @component('layouts.app.header')

    @endcomponent
</head>
<body class="c-app">

<div class="c-wrapper c-fixed-components">
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
