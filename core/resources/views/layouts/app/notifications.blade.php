{{--message_type values = primary, secondary, success, danger, warning, info, light, dark--}}
@if(session()->get('message_type'))
    <div class="alert alert-{{session()->pull('message_type')}} alert-dismissible fade show" role="alert">
        @if(session()->get('title'))
            <strong>{{session()->pull('title')}}</strong>
            <hr>
        @endif
        {{session()->pull('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@if ($errors->any())
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>The following error(s) have occured</strong>
            <hr>
            <ul>
                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
