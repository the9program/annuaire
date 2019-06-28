@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-40 mt-40">
                    <h4 class="text-gray mt-0 pt-5">{{ __('personal/login.welcome') }}</h4>
                    <hr>
                    <p>{{ __('personal/login.identity') }}</p>
                    <form  method="POST" >
                        @csrf
                        <div class="row">
                            @include('layouts.input',[
                              'width' => "col-md-12",
                              'label' => ucfirst(__('validation.attributes.email')) . '* :',
                              'type'  => "email",
                              'name'  => "email",
                              'value' => old('email'),
                              'attribute' => "required",
                          ])
                        </div>
                        <div class="row">
                            @include('layouts.input',[
                                'width' => "col-md-12",
                                'label' => ucfirst(__('validation.attributes.password')) . '* :',
                                'type'  => "password",
                                'name'  => "password",
                                'value' => old('password'),
                                'attribute' => "required",
                            ])
                        </div>
                        <div class="checkbox pull-left mt-15">
                            <label for="form_checkbox">
                                <input id="form_checkbox" name="remember" type="checkbox">
                                {{ __('personal/login.still_connect') }}
                            </label>
                        </div>
                        <div class="form-group pull-right mt-10 pb-40">
                            <a class="text-theme-colored font-weight-600 font-12"
                               href="{{ route('password.request') }}"> {{ __('personal/login.forgot') }}</a>
                        </div>

                        <div class="clear text-center pt-40">
                            <button type="submit" class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15"
                                    href="home.html"> {{ __('personal/login.login') }}
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Register -->
                <div class="col-md-7 col-md-offset-1">
                    <form name="reg-form" action="{{ route('register') }}" class="register-form" method="post">
                        @csrf
                        <div class="icon-box mb-0 p-0">
                            <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
                                <i class="pe-7s-users"></i>
                            </a>
                            <h4 class="text-gray pt-10 mt-0 mb-30">{{ __('personal/register.have_not') }}</h4>
                        </div>
                        <hr>
                        <p class="text-gray">{{ __('personal/register.register_now') }}</p>

                        <div class="row">
                            @include('layouts.input',[
                                'width' => "col-md-6",
                                'label' => ucfirst(__('validation.attributes.last_name')) . '* :',
                                'type'  => "text",
                                'name'  => "last_name",
                                'value' => old('last_name'),
                                'attribute' => "required",
                            ])
                            @include('layouts.input',[
                                'width' => "col-md-6",
                                'label' => ucfirst(__('validation.attributes.first_name')) . '* :',
                                'type'  => "text",
                                'name'  => "first_name",
                                'value' => old('first_name'),
                                'attribute' => "required",
                            ])
                        </div>

                        <div class="row">
                        @include('layouts.gender',[
                            'width' => "col-md-6",
                            'label' => ucfirst(__('validation.attributes.gender')) . '* :',
                            'name'  => "gender",
                            'value' => old('gender'),
                            'attribute' => "required",
                        ])
                        @include('layouts.input',[
                            'width' => "col-md-6",
                            'label' => ucfirst(__('validation.attributes.birth')) . '* :',
                            'type'  => "date",
                            'name'  => "birth",
                            'value' => old('birth'),
                            'attribute' => "required",
                        ])
                        </div>

                        <div class="row">
                            <!-- PHONES -->

                            @include('layouts.input',[
                                'width' => "col-xs-12",
                                'label' => ucfirst(__('validation.attributes.mobile')) . '* :',
                                'type'  => "tel",
                                'name'  => "mobile",
                                'value' => old('mobile'),
                                'attribute' => "required",
                            ])
                        </div>

                        <div class="row">

                            @include('layouts.input',[
                              'width' => "col-md-12",
                              'label' => ucfirst(__('validation.attributes.email')) . '* :',
                              'type'  => "email",
                              'name'  => "email",
                              'value' => old('email'),
                              'attribute' => "required",
                          ])

                        </div>

                        <div class="row">

                            @include('layouts.input',[
                                'width' => "col-md-6",
                                'label' => ucfirst(__('validation.attributes.password')) . '* :',
                                'type'  => "password",
                                'name'  => "password",
                                'value' => old('password'),
                                'attribute' => "required",
                            ])

                            @include('layouts.input',[
                                'width' => "col-md-6",
                                'label' => ucfirst(__('validation.attributes.password_confirmation')) . '* :',
                                'type'  => "password",
                                'name'  => "password_confirmation",
                                'value' => old('password_confirmation'),
                                'attribute' => "required",
                            ])

                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark btn-lg btn-block mt-15"
                                    type="submit">{{ __('personal/register.register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
