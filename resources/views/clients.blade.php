@extends('layouts.app')

@section('title', 'Clients')

@section('content')
    <div class="row" id="app">
        <div class="col-12">
            <passport-clients></passport-clients>
    {{--        <passport-authorized-clients></passport-authorized-clients>--}}
    {{--        <passport-personal-access-tokens></passport-personal-access-tokens>--}}
        </div>
    </div>
@endsection



@section('scripts')
    @parent
    {{--    This is appended to the master scripts.--}}

    <script src="{{ asset('/js/app.js') }}"></script>
@endsection

