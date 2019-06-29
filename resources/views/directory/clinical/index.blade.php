@extends('layouts.app')

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-8"
             data-bg-img="{{ asset('images/clinics.jpg') }}">
        <div class="container mt-60 mb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 xs-text-center">
                        <h3 class="title text-white">Clinics</h3>
                        <ol class="breadcrumb mt-10 white">
                            <li><a class="text-white" href="/">Home</a></li>
                            <li class="active text-theme-colored">Clinics</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="section-content">
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <a href="{{ route('clinical.create') }}"
                               class="btn btn-border hvr-bounce-to-right btn-theme-colored"
                            >{{ __('validation.attributes.create') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team">
        <div class="container">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 line-height-1">{{ __('establishment.our_doctor') }}</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="{{ asset('images/title-icon.png') }}" alt="">
                        </div>
                        <p>{!! __('establishment.our_doctor_msg') !!}</p>
                    </div>
                </div>
            </div>

            @foreach($clinics->chunk(4) as $chunk)
                <div class="row mtli-row-clearfix mt-15">
                    <div class="col-md-12">
                        <div class="owl-carousel-4col">
                            @foreach($chunk as $clinical)
                                <div class="item">
                                    <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                                        <div class="team-thumb">
                                            <img class="img-fullwidth"
                                                 style="height: 350px;"
                                                 title="{{ $clinical->name }}"
                                                 alt="{{ $clinical->name }}"
                                                 src="{{ asset('images/doctor.jpg') }}">
                                            <div class="team-overlay"></div>
                                        </div>
                                        <div class="team-details bg-silver-light pt-10 pb-10">
                                            <h4 class="text-uppercase font-weight-600 m-5"><a
                                                        href="{{ route('clinical.show',compact('clinical')) }}">{{ $clinical->name }}</a>
                                            </h4>
                                            <h6 class="text-theme-colored font-15 font-weight-400 mt-0">{{ $clinical->number_emergency }}</h6>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
@stop