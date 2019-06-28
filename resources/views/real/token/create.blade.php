@extends('layouts.app')
@section('page-title')

@stop
@section('content')


    <section>
        <div class="container">
            <div class="row">
                <div class="section-content">
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                            <form action="{{ route('token.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    @include('layouts.input',[
                                        'width' => "col-md-12",
                                        'label' => ucfirst(__('validation.attributes.email')) . '* :',
                                        'type'  => "email",
                                        'name'  => "email",
                                        'value' => old('eamil'),
                                        'attribute' => "required",
                                    ])
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 text-right">
                                        <button type="submit"
                                                class="btn btn-border hvr-bounce-to-right btn-theme-colored">
                                            <strong>{{ __('validation.attributes.create') }}</strong>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop