@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-11 col-md-offset-1">
                    <form name="reg-form" action="{{ route('clinical.store') }}" method="POST">
                        @csrf
                        <!-- name and speech -->
                        <div class="row">
                            @include('layouts.input',[
                                'width' => "col-md-12",
                                'label' => ucfirst(__('validation.attributes.name')) . '* :',
                                'type'  => "text",
                                'name'  => "name",
                                'value' => old('name'),
                                'attribute' => "required",
                            ])
                        </div>
                        <div class="row">
                            @include('layouts.textarea',[
                                'width' => "col-md-12",
                                'label' => ucfirst(__('validation.attributes.speech')) . ' :',
                                'name'  => "speech",
                                'value' => old('speech'),
                                'attribute' => "",
                            ])
                        </div>
                        <!-- \name and speech -->
                        <!-- Address -->
                        <div class="row">
                            @include('layouts.input',[
                            'width' => "col-md-12",
                            'label' => ucfirst(__('validation.attributes.address')) . '* :',
                            'type'  => "text",
                            'name'  => "address",
                            'value' => old('address'),
                            'attribute' => "required",
                        ])
                        </div>
                        <div class="row">
                            @include('layouts.input',[
                            'width' => "col-md-4",
                            'label' => ucfirst(__('validation.attributes.build')) . '* :',
                            'type'  => "number",
                            'name'  => "build",
                            'value' => old('build'),
                            'attribute' => "required",
                        ])
                            @include('layouts.input',[
                            'width' => "col-md-4",
                            'label' => ucfirst(__('validation.attributes.floor')) . ' :',
                            'type'  => "number",
                            'name'  => "floor",
                            'value' => old('floor'),
                            'attribute' => "",
                        ])
                            @include('layouts.input',[
                            'width' => "col-md-4",
                            'label' => ucfirst(__('validation.attributes.apt_nbr')) . ' :',
                            'type'  => "number",
                            'name'  => "apt_nbr",
                            'value' => old('apt_nbr'),
                            'attribute' => "",
                        ])

                        </div>
                        <div class="row">
                            @include('layouts.input',[
                            'width' => "col-md-6",
                            'label' => ucfirst(__('validation.attributes.zip')) . ' :',
                            'type'  => "number",
                            'name'  => "zip",
                            'value' => old('zip'),
                            'attribute' => "",
                        ])
                            @include('layouts.city',[
                            'width' => "col-md-6",
                        ])
                        </div>
                        <!-- \Address -->

                        <!-- Emergency phone -->
                        <div class="row">
                            @include('layouts.input',[
                                'width' => "col-md-12",
                                'label' => ucfirst(__('validation.attributes.phone')) . ' :',
                                'type'  => "tel",
                                'name'  => "number_emergency",
                                'value' => old('number_emergency'),
                                'attribute' => "",
                            ])
                        </div>
                        <!-- \Emergency phone -->

                        <!-- Opening -->
                        <div class="row">
                            <div class="col-md-4">
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "lun_from",
                                    'type'  => "time",
                                    'name'  => "lun_from",
                                    'value' => old('lun_from'),
                                    'attribute' => "required",
                                ])
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "lun_to",
                                    'type'  => "time",
                                    'name'  => "lun_to",
                                    'value' => old('lun_to'),
                                    'attribute' => "required",
                                ])
                            </div>
                            <div class="col-md-4">
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "sam_from",
                                    'type'  => "time",
                                    'name'  => "sam_from",
                                    'value' => old('sam_from'),
                                    'attribute' => "required",
                                ])
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "sam_to",
                                    'type'  => "time",
                                    'name'  => "sam_to",
                                    'value' => old('sam_to'),
                                    'attribute' => "required",
                                ])
                            </div>
                            <div class="col-md-4">
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "dim_from",
                                    'type'  => "time",
                                    'name'  => "dim_from",
                                    'value' => old('dim_from'),
                                    'attribute' => "",
                                ])
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "dim_to",
                                    'type'  => "time",
                                    'name'  => "dim_to",
                                    'value' => old('dim_to'),
                                    'attribute' => "",
                                ])
                            </div>
                        </div>
                        <!-- \Opening -->

                        <!-- Services -->
                        <div class="row">
                            <div class="col-md-6">
                                @include('directory.clinical.service',[
                                    'name'  => 'consultation',
                                    'label' => "consultation"
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('directory.clinical.service',[
                                    'name'  => 'operation',
                                    'label' => "operation"
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('directory.clinical.service',[
                                    'name'  => 'emergency',
                                    'label' => "emergency"
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('directory.clinical.service',[
                                    'name'  => 'payment',
                                    'label' => "payment"
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('directory.clinical.service',[
                                    'name'  => 'charges',
                                    'label' => "charges"
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('directory.clinical.service',[
                                    'name'  => 'hospitalisation',
                                    'label' => "hospitalisation"
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('directory.clinical.service',[
                                    'name'  => 'doctors',
                                    'label' => "doctors"
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('directory.clinical.service',[
                                    'name'  => 'nurse',
                                    'label' => "nurse"
                                ])
                            </div>
                            <div class="col-md-6">
                                @include('directory.clinical.service',[
                                    'name'  => 'handicap',
                                    'label' => "handicap"
                                ])
                            </div>
                        </div>
                        <!-- \Services -->

                        <!-- Submit -->
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <button type="submit"
                                        class="btn btn-border hvr-bounce-to-right btn-theme-colored">
                                    <strong>{{ __('validation.attributes.create') }}</strong>
                                </button>
                            </div>
                        </div>
                        <!-- \Submit -->
                    </form>
                </div>

            </div>
        </div>
    </section>
@stop