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
                            <form action="{{ route('address.update',compact('address')) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row">
                                    @include('layouts.input',[
                                    'width' => "col-md-12",
                                    'label' => ucfirst(__('validation.attributes.address')) . '* :',
                                    'type'  => "text",
                                    'name'  => "address",
                                    'value' => (old('address')) ? old('address') : $address->address,
                                    'attribute' => "required",
                                ])
                                </div>
                                <div class="row">
                                    @include('layouts.input',[
                                    'width' => "col-md-4",
                                    'label' => ucfirst(__('validation.attributes.build')) . '* :',
                                    'type'  => "number",
                                    'name'  => "build",
                                    'value' => (old('build')) ? old('build') : $address->build,
                                    'attribute' => "required",
                                ])
                                    @include('layouts.input',[
                                    'width' => "col-md-4",
                                    'label' => ucfirst(__('validation.attributes.floor')) . ' :',
                                    'type'  => "number",
                                    'name'  => "floor",
                                    'value' => (old('floor')) ? old('floor') : $address->floor,
                                    'attribute' => "",
                                ])
                                    @include('layouts.input',[
                                    'width' => "col-md-4",
                                    'label' => ucfirst(__('validation.attributes.apt_nbr')) . ' :',
                                    'type'  => "number",
                                    'name'  => "apt_nbr",
                                    'value' => (old('apt_nbr')) ? old('apt_nbr') : $address->apt_nbr,
                                    'attribute' => "",
                                ])

                                </div>
                                <div class="row">
                                    @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => ucfirst(__('validation.attributes.zip')) . ' :',
                                    'type'  => "number",
                                    'name'  => "zip",
                                    'value' => (old('zip')) ? old('zip') : $address->zip,
                                    'attribute' => "",
                                ])
                                    @include('layouts.city',[
                                    'width' => "col-md-6",
                                ])
                                </div>
                                <div class="row">
                                    <div class="checkbox pull-left mt-15 ml-15">
                                        <label for="form_checkbox">
                                            <input id="form_checkbox" {{ ($address->default) ? 'checked' : '' }} name="default" type="checkbox">
                                            {{ __('personal/mobile.default') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 text-right">
                                        <button type="submit"
                                                class="btn btn-border hvr-bounce-to-right btn-theme-colored">
                                            <strong>{{ __('validation.attributes.update') }}</strong>
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