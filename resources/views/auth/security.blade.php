@extends('layouts.app')

@section('content')

    <section class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="border-1px p-30 mb-0">
                        <h3 class="text-theme-colored mt-0 pt-5">{{ __('personal/security.update_email') }}</h3>
                        <hr>

                        <blockquote>
                            <p class="font-13">
                                {{ __('personal/security.blockquote_email') }}</p>
                        </blockquote>
                        <form method="POST">
                            @csrf
                            <div class="row">
                                @include('layouts.input',[
                                      'width' => "col-md-12",
                                      'label' => ucfirst(__('validation.attributes.email')) . '* :',
                                      'type'  => "email",
                                      'name'  => "email",
                                      'value' => auth()->user()->email,
                                      'attribute' => "required",
                                  ])
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-border hvr-icon-forward btn-theme-colored col-xs-12">
                                        <strong>{{ __('validation.attributes.update') }}</strong>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border-1px p-30 mb-0">
                        <h3 class="text-theme-colored mt-0 pt-5">{{ __('personal/security.update_psw') }}</h3>
                        <hr>

                        <blockquote>
                            <p class="font-13">{{ __('personal/security.blockquote_psw') }}</p>
                        </blockquote>
                        <form method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                @include('layouts.input',[
                                      'width' => "col-md-12",
                                      'label' => ucfirst(__('validation.attributes.current_password')) . '* :',
                                      'type'  => "password",
                                      'name'  => "current_password",
                                      'value' => null,
                                      'attribute' => "required",
                                  ])
                                @include('layouts.input',[
                                      'width' => "col-md-12",
                                      'label' => ucfirst(__('validation.attributes.password')) . '* :',
                                      'type'  => "password",
                                      'name'  => "password",
                                      'value' => null,
                                      'attribute' => "required",
                                  ])
                                @include('layouts.input',[
                                      'width' => "col-md-12",
                                      'label' => ucfirst(__('validation.attributes.password_confirmation')) . '* :',
                                      'type'  => "password",
                                      'name'  => "password_confirmation",
                                      'value' => null,
                                      'attribute' => "required",
                                  ])
                            </div>
                            <div class="row">
                                <div class="form-group">
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
        </div>
    </section>
@stop