@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="section-content">
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                            <form action="{{ route('params') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    @include('layouts.file',[
                                        'width'     => 'col-md-6',
                                        'name'      => 'avatar',
                                        'label'     => __('validation.attributes.avatar') . ' :',
                                        'value'     => (auth()->user()->avatar) ? auth()->user()->avatar : null
                                    ])
                                    @include('layouts.input',[
                                        'width' => "col-md-6",
                                        'label' => ucfirst(__('validation.attributes.cin')) . '* :',
                                        'type'  => "text",
                                        'name'  => "cin",
                                        'value'     => (!old('cin')) ? auth()->user()->real->cin : old('cin'),
                                        'attribute' => "",
                                    ])
                                </div>

                                <div class="row">
                                    @include('layouts.input',[
                                        'width' => "col-md-6",
                                        'label' => ucfirst(__('validation.attributes.last_name')) . '* :',
                                        'type'  => "text",
                                        'name'  => "last_name",
                                        'value' => (old('last_name')) ? old('last_name') : auth()->user()->real->last_name,
                                        'attribute' => "required",
                                    ])
                                    @include('layouts.input',[
                                        'width' => "col-md-6",
                                        'label' => ucfirst(__('validation.attributes.first_name')) . '* :',
                                        'type'  => "text",
                                        'name'  => "first_name",
                                        'value' => (old('first_name')) ? old('first_name') : auth()->user()->real->first_name,
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
                                        'value' => old('birth') ? old('birth') : auth()->user()->real->birth,
                                        'attribute' => "required",
                                    ])
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