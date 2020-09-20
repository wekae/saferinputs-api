@extends('layouts.app')

@section('title', 'Deactivate Account')

@section('content')
    <div class="row" id="app">
        <div class="col-md-8 offset-md-2">

            @auth
                <div class="card">
                    <div class="card-header">
                        <strong>Deactivate Account?</strong>
                        <small></small>
                    </div>
                    <div class="card-body">
                        <form  class="needs-validation" novalidate method="post" action="/users/{{$user->koan_users_id}}/account/deactivate">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12">
                                    @component('layouts.app.notifications')

                                    @endcomponent
                                </div>

                                <div class="col-md-12">
                                    <table class="table table-striped table-borderless">
                                        <tr><th scope="row">User Id</th><td>{{ $user->koan_users_id ?? 'this-is-where-your-id-goes' }}</td></tr>
                                        <tr><th scope="row">Name</th><td>{{ $user->name ?? 'Account Name' }}</td></tr>
                                        <tr><th scope="row">Email</th><td>{{ $user->email ?? 'user@email.xom' }}</td></tr>
                                        <tr><th scope="row">Access Level</th>
                                            <td>
                                                @switch($user->access_level ?? -1)
                                                    @case(1)
                                                    Super Admin
                                                    @break

                                                    @case(2)
                                                    Editor
                                                    @break

                                                    @case(3)
                                                    Author
                                                    @break

                                                    @default
                                                    Not Assigned
                                                @endswitch
                                            </td>
                                        </tr>
                                    </table>
                                    <p></p>

                                    <div class="row">
                                        <div class="col-md-12 text-right align-items-end">
                                            <a href="{{ url()->previous() }}" class="btn btn-light m-1">Cancel</a>
                                            <button type="submit" class="btn btn-danger m-1">Deactivate</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <h3>You Have Insufficient Privileges To Perform This Action</h3>
            @endguest


        </div>
    </div>
@endsection



@section('scripts')
    @parent
    {{--    This is appended to the master scripts.--}}

    <script src="{{ asset('/js/app.js') }}"></script>
@endsection

