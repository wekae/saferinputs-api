@extends('layouts.app')

@section('title', 'Change Password')

@section('content')
    <div class="row" id="app">
        <div class="col-7">

            @auth
                <div class="card">
                    <div class="card-header">
                        <strong>Edit</strong>
                        <small>Change Password</small>
                    </div>
                    <div class="card-body">
                        <form  class="needs-validation" novalidate method="post" action="/users/{{$user->koan_users_id}}/password/change">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12">
                                    @component('layouts.app.notifications')

                                    @endcomponent
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="oldPassword">Current Password</label>
                                    <input type="password" class="form-control" id="oldPassword" placeholder="Current Password" required name="old_password" value="{{old('old_password')}}">
                                    <div class="invalid-feedback">
                                        Please provide the old password.
                                    </div>
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
                            <button type="submit" class="btn btn-primary">Change Password</button>
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

