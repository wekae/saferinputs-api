@extends('layouts.app')

@section('title', 'New User')

@section('content')
    <div class="row" id="app">
        <div class="col-7">

            @auth
                <div class="card">
                    <div class="card-header">
                        <strong>New</strong>
                        <small>User Account</small>
                    </div>
                    <div class="card-body">
                        <form  class="needs-validation" novalidate method="post" action="/users/new">
                            @csrf
                            <div class="form-row">
                                @component('layouts.app.notifications')

                                @endcomponent
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name" required name="first_name" value="{{old('first_name')}}">
                                    <div class="invalid-feedback">
                                        Please provide a first name.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Last Name" required name="last_name" value="{{old('last_name')}}">
                                    <div class="invalid-feedback">
                                        Please provide a last name.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email" required name="email" value="{{old('email')}}">
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" required name="password">
                                    <div class="invalid-feedback">
                                        The password is required.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="passwordConfirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="passwordConfirmation" placeholder="Confirm Password" required name="password_confirmation">
                                    <div class="invalid-feedback">
                                        The password is required and should match.
                                    </div>
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
                <p>User not authenticated</p>
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

