@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 mb-40">
                    <h4 class="text-primary title mt-0 pt-5">{{ __('personal/reset.reset') }}</h4>
                    <hr>
                    <blockquote>
                        <p class="font-13">{{ __('personal/reset.blockquote') }}</p>
                    </blockquote>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row">
                            @include('layouts.input',[
                              'width' => "col-md-12",
                              'label' => ucfirst(__('validation.attributes.email')) . '* :',
                              'type'  => "email",
                              'name'  => "email",
                              'value' => (old('email')) ? old('email') : $email,
                              'attribute' => "required",
                            ])
                            @include('layouts.input',[
                                'width' => "col-md-12",
                                'label' => ucfirst(__('validation.attributes.password')) . '* :',
                                'type'  => "password",
                                'name'  => "password",
                                'value' => old('password'),
                                'attribute' => "required",
                            ])
                            @include('layouts.input',[
                                'width' => "col-md-12",
                                'label' => ucfirst(__('validation.attributes.password_confirmation')) . '* :',
                                'type'  => "password",
                                'name'  => "password_confirmation",
                                'value' => old('password_confirmation'),
                                'attribute' => "required",
                            ])
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit"
                                        class="btn btn-border hvr-icon-forward btn-theme-colored col-xs-12">
                                    <strong>{{ __('validation.attributes.update') }}</strong>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection