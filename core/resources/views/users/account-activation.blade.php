@extends('layouts.app-alt')



@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        <p>{{$message}}</p>
                        <a href="{{$url ?? ''}}">{{$url ?? ''}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
