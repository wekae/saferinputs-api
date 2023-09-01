@extends('layouts.app')

@section('title', 'Authorized Clients')

@section('content')
    <div class="row" id="app">
        <div class="col-12">
            <passport-personal-access-tokens></passport-personal-access-tokens>
            {{--        <passport-personal-access-tokens></passport-personal-access-tokens>--}}
        </div>

    </div>
@endsection



@section('scripts')
    @parent
    {{--    This is appended to the master scripts.--}}

    <script src="{{ asset('/js/app.js') }}"></script>
@endsection

