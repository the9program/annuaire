@extends('layouts.app')
@section('page-title')

@stop
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="section-content">
                    <div class="row mb-15">
                        <div class="col-xs-12">
                            <div class="col-xs-12 text-right">
                                <button class="btn btn-border hvr-bounce-to-right btn-theme-colored">
                                    <a href="{{ route('address.create') }}"><strong>{{ __('validation.attributes.create') }}</strong></a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <tr>
                                <th class="text-center">{{ __("validation.attributes.address") }}</th>
                                <th class="text-center" colspan="2">action</th>
                            </tr>
                            @if(isset($addresses[0]))
                                @foreach($addresses as $address)
                                    <tr class="{{ ($address->default) ? 'info' : '' }}">
                                        <td class="text-center">{{ $address->full_address }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('address.edit',compact('address')) }}"
                                               class="text-primary">{{ __('validation.attributes.edit') }}</a>
                                        </td>
                                        <td class="text-center">
                                            @if(!$address->default)
                                                <a href="#" class="text-danger" onclick="event.preventDefault();
                                                        document.getElementById('{{ 'delete-' . $address->id }}').submit();">
                                                    {{ __('validation.attributes.delete') }}
                                                </a>
                                                <form id="delete-{{ $address->id }}"
                                                      action="{{ route('address.destroy',compact('address')) }}"
                                                      method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @else

                                <tr class="warning">
                                    <td class="text-center" colspan="2">Vous n'avez aucun address</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop