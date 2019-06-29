@extends('layouts.app')

@section('content')

    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-11 col-md-offset-1">
                    <form name="reg-form" action="{{ route('clinical.update',compact('clinical')) }}" method="POST">
                        @csrf
                        @method('put')
                        <!-- name and speech -->
                        <div class="row">
                            @include('layouts.input',[
                                'width' => "col-md-12",
                                'label' => ucfirst(__('validation.attributes.name')) . '* :',
                                'type'  => "text",
                                'name'  => "name",
                                'value' => (old('name')) ? old('name') : $clinical->name,
                                'attribute' => "required",
                            ])
                        </div>
                        <div class="row">
                            @include('layouts.textarea',[
                                'width' => "col-md-12",
                                'label' => ucfirst(__('validation.attributes.speech')) . ' :',
                                'name'  => "speech",
                                'value' => (old('speech')) ? old('speech') : $clinical->speech,
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
                            'value' => (old('address')) ? old('address') : $clinical->address->address,
                            'attribute' => "required",
                        ])
                        </div>
                        <div class="row">
                            @include('layouts.input',[
                            'width' => "col-md-4",
                            'label' => ucfirst(__('validation.attributes.build')) . '* :',
                            'type'  => "number",
                            'name'  => "build",
                            'value' => (old('build')) ? old('build') : $clinical->address->build,
                            'attribute' => "required",
                        ])
                            @include('layouts.input',[
                            'width' => "col-md-4",
                            'label' => ucfirst(__('validation.attributes.floor')) . ' :',
                            'type'  => "number",
                            'name'  => "floor",
                            'value' => (old('floor')) ? old('floor') : $clinical->address->floor,
                            'attribute' => "",
                        ])
                            @include('layouts.input',[
                            'width' => "col-md-4",
                            'label' => ucfirst(__('validation.attributes.apt_nbr')) . ' :',
                            'type'  => "number",
                            'name'  => "apt_nbr",
                            'value' => (old('apt_nbr')) ? old('apt_nbr') : $clinical->address->apt_nbr,
                            'attribute' => "",
                        ])

                        </div>
                        <div class="row">
                            @include('layouts.input',[
                            'width' => "col-md-6",
                            'label' => ucfirst(__('validation.attributes.zip')) . ' :',
                            'type'  => "number",
                            'name'  => "zip",
                            'value' => (old('zip')) ? old('zip') : $clinical->address->zip,
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
                                'value' => (old('number_emergency')) ?old('number_emergency'): $clinical->number_emergency,
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
                                    'value' => (old('lun_from')) ? \Carbon\Carbon::parse(old('lun_from'))->format('H:i') : \Carbon\Carbon::parse($clinical->opening->lun_from)->format('H:i'),
                                    'attribute' => "required",
                                ])
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "lun_to",
                                    'type'  => "time",
                                    'name'  => "lun_to",
                                    'value' => (old('lun_to')) ? \Carbon\Carbon::parse(old('lun_to'))->format('H:i') : \Carbon\Carbon::parse($clinical->opening->lun_to)->format('H:i'),
                                    'attribute' => "required",
                                ])
                            </div>
                            <div class="col-md-4">
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "sam_from",
                                    'type'  => "time",
                                    'name'  => "sam_from",
                                    'value' => (old('sam_from')) ? \Carbon\Carbon::parse(old('sam_from'))->format('H:i') : \Carbon\Carbon::parse($clinical->opening->sam_from)->format('H:i'),
                                    'attribute' => "required",
                                ])
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "sam_to",
                                    'type'  => "time",
                                    'name'  => "sam_to",
                                    'value' => (old('sam_to')) ? \Carbon\Carbon::parse(old('sam_to'))->format('H:i') : \Carbon\Carbon::parse($clinical->opening->sam_to)->format('H:i'),
                                    'attribute' => "required",
                                ])
                            </div>
                            <div class="col-md-4">
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "dim_from",
                                    'type'  => "time",
                                    'name'  => "dim_from",
                                    'value' => (old('dim_from'))
                                    ? \Carbon\Carbon::parse(old('dim_from'))->format('H:i')
                                    : ($clinical->opening->dim_from)
                                    ? \Carbon\Carbon::parse($clinical->opening->dim_from)->format('H:i')
                                    : null,
                                    'attribute' => "",
                                ])
                                @include('layouts.input',[
                                    'width' => "col-md-6",
                                    'label' => "dim_to",
                                    'type'  => "time",
                                    'name'  => "dim_to",
                                    'value' => (old('dim_to')) ? \Carbon\Carbon::parse(old('dim_to'))->format('H:i') : ($clinical->opening->dim_to) ? \Carbon\Carbon::parse($clinical->opening->dim_to)->format('H:i') : null,
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
                                    'label' => "consultation",
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
                                    <strong>{{ __('validation.attributes.update') }}</strong>
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