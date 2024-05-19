


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
                    <h3>User Name  :<span class="text-danger">{{ Auth::user()->name }}</span></h3>
                    <h3>User Email  :<span class="text-danger">{{ Auth::user()->email }}</span></h3>
                </div>
                
            </div>
        </div>
    </div>
    </div>
@endsection
