@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 mb-40">
                    <h4 class="text-primary title mt-0 pt-5">{{ __('personal/reset.reset') }}</h4>
                    <hr>
                    <blockquote>
                        @if(session('status'))
                            <p class="font-13 text-success">{{ session('status') }}</p>
                        @else
                            <p class="font-13">{{ __('personal/email.blockquote') }}</p>
                        @endif
                    </blockquote>
                    <form method="POST" action="{{ route('password.email') }}">
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
                            <div class="col-xs-12">
                                <button type="submit"
                                        class="btn btn-border hvr-icon-forward btn-theme-colored col-xs-12">
                                    <strong>{{ __('validation.attributes.send') }}</strong>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>@endsection
