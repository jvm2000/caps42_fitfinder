@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Email Verification Notice') }}</div>

                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            {{ __('Please verify your email address to fully access all features.') }}
                            {{ __('If you have not received the email') }}, 
                            <a href="/home">{{ __('click here to request another') }}</a>.
                        </div>

                        <!-- Additional content goes here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
