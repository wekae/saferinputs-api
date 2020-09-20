@extends('layouts.app')

@section('title', 'Edit Details')

@section('content')
    <div class="row" id="app">
        <div class="col-7">

            @auth
                <div class="card">
                    <div class="card-header">
                        <strong>Edit</strong>
                        <small>Personal Details</small>
                    </div>
                    <div class="card-body">
                        <form  class="needs-validation" novalidate method="post" action="/users/{{$user->id}}/edit">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12">
                                    @component('layouts.app.notifications')

                                    @endcomponent
                                </div>
                                <table class="table table-striped table-borderless">
                                    <tr><th scope="row">User Id</th><td>{{ $user->id ?? 'this-is-where-your-id-goes' }}</td></tr>
                                    <tr><th scope="row">Name</th><td>{{ $user->first_name.' '.$user->last_name ?? 'Account Name' }}</td></tr>
                                </table>
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="First Name" required name="first_name" value="{{ $user->first_name ?? 'An' }}">
                                    <div class="invalid-feedback">
                                        Please provide a first name.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="Last Name" required name="last_name" value="{{ $user->last_name ?? 'Other' }}">
                                    <div class="invalid-feedback">
                                        Please provide a last name.
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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

