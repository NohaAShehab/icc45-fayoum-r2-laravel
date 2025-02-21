@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
{{--                        @dump(Auth::user())--}}
                        <div class="card shadow-sm text-center p-3" style="max-width: 300px;">
                            <img src="{{asset("storage/".Auth::user()->image)}}" class="img-fluid rounded" alt="User Image">
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
