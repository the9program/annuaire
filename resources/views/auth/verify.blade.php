@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('personal/verify.verify') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('personal/verify.resent') }}
                        </div>
                    @endif
                    {!! __('personal/verify.text',['route' => route('verification.resend') ]) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
