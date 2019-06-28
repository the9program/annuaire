@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-1">
                    <form name="reg-form" action="{{ route('token.update',compact('token')) }}" class="register-form" method="post">
                        @csrf
                        @method('put')
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
                                'width' => "col-xs-6",
                                'label' => ucfirst(__('validation.attributes.mobile')) . '* :',
                                'type'  => "tel",
                                'name'  => "mobile",
                                'value' => old('mobile'),
                                'attribute' => "required",
                            ])

                            @include('layouts.input',[
                                'width' => "col-xs-6",
                                'label' => ucfirst(__('validation.attributes.token')) . '* :',
                                'type'  => "text",
                                'name'  => "token",
                                'value' => old('token'),
                                'attribute' => "required",
                            ])
                        </div>

                        <div class="row">

                            @include('layouts.input',[
                              'width' => "col-md-12",
                              'label' => ucfirst(__('validation.attributes.email')) . '* :',
                              'type'  => "email",
                              'name'  => "email",
                              'value' => (old('email')) ? old('email') : $token->email,
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
