@extends('layouts.app')

@section('content')
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-8"
             data-bg-img="{{ asset('images/clinics.jpg') }}">
        <div class="container pt-60 pb-60">
            <!-- Section Content -->
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 xs-text-center">
                        <h3 class="title text-white">Clinics</h3>
                        <ol class="breadcrumb mt-10 white">
                            <li><a class="text-white" href="/">Home</a></li>
                            <li><a class="text-white" href="{{ route('clinical.index') }}">Clinics</a></li>
                            <li class="active text-theme-colored">{{ $clinical->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: about -->
    <section class="">
        <div class="container pb-0">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-gray mt-0 mt-sm-30 mb-0">Welcome To</h3>
                    <h2 class="text-theme-colored mt-0">{{ $clinical->name }}</h2>
                    <p class="font-weight-600">{{ $clinical->speech }}</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/doctor_11.jpg') }}" alt="">
                </div>
                <div class="col-md-4">
                    <div class="border-10px p-30">
                        <h5><i class="fa fa-clock-o text-theme-colored"></i> Opening Hours</h5>
                        <div class="opening-hours text-left">
                            <ul class="list-unstyled">
                                <li class="clearfix line-height-1"><span> Lundi - Vendredi </span>
                                    <div class="value"> {{ \Carbon\Carbon::parse($clinical->opening->lun_from)->format('H:i') }}
                                        - {{ \Carbon\Carbon::parse($clinical->opening->lun_to)->format('H:i') }} </div>
                                </li>
                                <li class="clearfix line-height-1"><span> Samedi </span>
                                    <div class="value"> {{ \Carbon\Carbon::parse($clinical->opening->sam_from)->format('H:i') }}
                                        - {{ \Carbon\Carbon::parse($clinical->opening->from_to)->format('H:i') }} </div>
                                </li>
                                <li class="clearfix line-height-1"><span> Dimanche </span>
                                    @if($clinical->opening->dim_from)
                                        <div class="value"> {{ $clinical->opening->dim_from }}</div>
                                    @else
                                        <div class="value">
                                            <button class="btn btn-primary">Fermer</button>
                                        </div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <h5 class="mt-30"><i class="fa fa-pencil-square-o text-theme-colored"></i> Need Help?</h5>
                        <p class="mt-0">Just make an appointment to get help from our experts</p>
                        <a href="#" class="btn btn-dark btn-theme-colored mt-15">Make Appointment Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($clinical->number_emergency)
        <!-- Divider: Divider -->
        <section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="{{ asset('images/bg/bg5.jpg') }}" data-parallax-ratio="0.7">
            <div class="container pt-90 pb-90">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 text-center">
                            <h2 class="font-28 text-white">Pour Le service d'urgence veuillez contacter</h2>
                            <h3 class="font-30 text-white">({{ $clinical->number_emergency }})</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Section: Services -->
    <section id="services" class="bg-silver-light">
        <div class="container pb-40">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-uppercase mt-0 line-height-1">Services</h2>
                        <div class="title-icon">
                            <img class="mb-10" src="{{ asset('images/title-icon.png') }}" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!
                        </p>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row">
                    @foreach($clinical->services as $service)
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="text-center mb-30 p-10">
                                {!! $service->icon !!}
                                <h4 class="font-weight-600 mt-20">{{ __('directory/clinical.services.' . $service->service . '.name') }}</h4>
                                <p>{{ __('directory/clinical.services.' . $service->service . '.description') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@stop