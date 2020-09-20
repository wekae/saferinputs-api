@extends('layouts.app')

@section('title', 'Change Access Level')

@section('content')
    <div class="row" id="app">
        <div class="col-7">

            @auth
                <div class="card">
                    <div class="card-header">
                        <strong>Edit</strong>
                        <small>Change Access Level</small>
                    </div>
                    <div class="card-body">
                        <form  class="needs-validation" novalidate method="post" action="/users/{{$user->koan_users_id}}/access_level/edit">
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
                                        <tr><th scope="row">Current Access Level</th>
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
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="accessLevel">Access Level</label>
                                    <select id="accessLevel" class="form-control" required name="access_level">
                                        <option value="{{old('access_level')}}" selected>Choose Access Level</option>
                                        <option value="1">Super Admin</option>
                                        <option value="2">Editor</option>
                                        <option value="3">Author</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Select an access level.
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Account</button>
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

