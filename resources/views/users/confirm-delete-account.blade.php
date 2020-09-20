@extends('layouts.app')

@section('title', 'Deactivate Account')

@section('content')
    <div class="row" id="app">
        <div class="col-md-8 offset-md-2">

            @auth
                <div class="card">
                    <div class="card-header">
                        <strong>Delete Account?</strong>
                        <small></small>
                    </div>
                    <div class="card-body">
                        <form  class="needs-validation" novalidate method="post" action="/users/{{$user->koan_users_id}}/account/delete">
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

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="deleteType"></label>
                                            <select id="deleteType" class="form-control" required name="delete_type">
                                                <option value="" selected>-- Choose Delete Type --</option>
                                                <option value="soft">Soft Delete</option>
                                                <option value="permanent">Permanent Delete</option>
                                            </select>
                                            <small id="deleteHelpText" class="form-text text-muted">
                                                <ul>
                                                    <li><strong>Soft Delete</strong> - Not actually removed from the database</li>
                                                    <li><strong>Permanent Delete</strong> - Removed from the database</li>
                                                </ul>
                                            </small>
                                            <div class="invalid-feedback">
                                                Would you like to perform a soft delete or delete the user permanently?
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
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

