<?php

namespace App\Http\Controllers\Personal;

use App\Address;
use App\City;
use App\Http\Requests\Personal\Real\AddressRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{

    public function index()
    {
       // dd(auth()->user()->real->addresses);
        return view('real.address.index', [

            'addresses' => auth()->user()->real->addresses

        ]);

    }

    public function create()
    {

        return view('real.address.create');

    }

    public function store(AddressRequest $request)
    {

        if ($request->default) {

            foreach (auth()->user()->real->addresses as $address) {

                $address->update(['default' => false]);

            }

            $request->request->add(['default' => true]);

            session()->flash('success', __('personal/mobile.created_default'));
        }

        else {

            $request->request->add(['default' => false]);


            session()->flash('success', __('personal/address.created'));

        }

        auth()->user()
            ->real->addresses()
            ->create($request->all([
                'default', 'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id'
            ]));

        return redirect()->route('address.index');

    }

    public function edit(Address $address)
    {

        return view('real.address.edit',compact('address'));

    }

    public function update(AddressRequest $request, Address $address)
    {

        if ($request->default) {

            foreach (auth()->user()->real->addresses as $addresses) {

                $addresses->update(['default' => false]);

            }

            $request->request->add(['default' => true]);

            session()->flash('success', __('personal/address.updated_default'));

        }

        else {

            $request->request->add(['default' => false]);


            session()->flash('success', __('personal/address.updated'));

        }

        $address->update($request->all([
            'default', 'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id'
        ]));

        return redirect()->route('address.index');

    }

    public function destroy(Address $address)
    {

        $address->delete();

        session()->flash('success', __('personal/address.deleted'));

        return redirect()->route('address.index');

    }
}
