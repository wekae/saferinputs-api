@extends('layouts.app')

@section('title', $title ?? 'User Profile')

@section('content')
    <div class="row" id="app">
        <div class="col-lg-7">

            @auth
                <div class="card">
                    <div class="card-header">
                        <strong>Details</strong>
                        <small>User Account</small>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @component('layouts.app.notifications')

                                @endcomponent

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
                                    <tr><th scope="row">Status</th><td>
                                            @switch($user->active ?? -1)
                                                @case(1)
                                                <span class="badge bg-success p-2 text-white">Active</span>
                                                @break

                                                @case(0)
                                                <span class="badge bg-danger p-2 text-white">Deactivated</span>
                                                @break

                                                @default
                                                <span class="badge bg-warning p-2 text-white">Deactivated</span>
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr><th scope="row">Account verified</th><td>
                                            @if($user->email_verified_at)
                                                <span class="badge bg-info p-2 text-white">Yes</span>
                                            @else
                                                <span class="badge bg-warning p-2 text-white">No</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                <p></p>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <ul class="nav flex-column">
                                    <li class="c-sidebar-nav-item">
                                        <a class="c-sidebar-nav-link" href="/users/{{$user->koan_users_id}}/edit">
                                            <svg class="c-sidebar-nav-icon">
                                                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-pen-alt')}}"></use>
                                            </svg>Edit Details
                                        </a>
                                    </li>

                                    @if(Auth::user()->koan_users_id === $user->koan_users_id)
                                        <li class="c-sidebar-nav-item">
                                            <a class="c-sidebar-nav-link" href="/users/{{$user->koan_users_id}}/password/change">
                                                <svg class="c-sidebar-nav-icon">
                                                    <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-lock-locked')}}"></use>
                                                </svg>Change Password
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->access_level === 1)
                                        @if(Auth::user()->koan_users_id !== $user->koan_users_id)
                                            <li class="c-sidebar-nav-item">
                                                <a class="c-sidebar-nav-link" href="/users/{{$user->koan_users_id}}/access_level/edit">
                                                    <svg class="c-sidebar-nav-icon">
                                                        <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-credit-card')}}"></use>
                                                    </svg>Change Access Level
                                                </a>
                                            </li>
                                        @endif
                                    @endif

                                    @if(Auth::user()->access_level === 1)
                                        @if(Auth::user()->koan_users_id !== $user->koan_users_id)
                                            @switch($user->active ?? -1)
                                                @case(1)
                                                <li class="c-sidebar-nav-item">
                                                    <a class="c-sidebar-nav-link" href="/users/{{$user->koan_users_id}}/account/deactivate">
                                                        <svg class="c-sidebar-nav-icon">
                                                            <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-media-pause')}}"></use>
                                                        </svg>De-activate Account
                                                    </a>
                                                </li>
                                                @break

                                                @default
                                                @if($user->email_verified_at && $user->active === 0)
                                                    <li class="c-sidebar-nav-item">
                                                        <a class="c-sidebar-nav-link" href="/users/{{$user->koan_users_id}}/account/activate">
                                                            <svg class="c-sidebar-nav-icon">
                                                                <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-media-play')}}"></use>
                                                            </svg>Activate Account
                                                        </a>
                                                    </li>
                                                @endif
                                                @break
                                            @endswitch
                                        @endif
                                    @endif

                                    @if(Auth::user()->access_level === 1)
                                        @if(Auth::user()->koan_users_id !== $user->koan_users_id)
                                            <li class="c-sidebar-nav-item">
                                                <a class="c-sidebar-nav-link" href="/users/{{$user->koan_users_id}}/account/delete">
                                                    <svg class="c-sidebar-nav-icon">
                                                        <use xlink:href="{{asset('assets/icons/sprites/free.svg#cil-trash')}}"></use>
                                                    </svg>Delete Account
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth

            @guest
                <p>User not authenticated</p>
            @endguest

        </div>
    </div>

    <style>
        .c-sidebar-nav-item:hover, .c-sidebar-nav-item:focus{
            transition: all .2s ease-in-out;
            background-color: #537286;
        }
        .c-sidebar-nav-item:hover a, .c-sidebar-nav-item:focus a{
            color:whitesmoke;
        }

    </style>
@endsection



@section('scripts')
    @parent
    {{--    This is appended to the master scripts.--}}



    <script src="{{ asset('/js/app.js') }}"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection

