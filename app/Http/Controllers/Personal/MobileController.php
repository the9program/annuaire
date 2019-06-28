<?php

namespace App\Http\Controllers\Personal;

use App\Http\Requests\Personal\Real\MobileRequest;
use App\Phone;
use App\Http\Controllers\Controller;

class MobileController extends Controller
{

    public function index()
    {

        return view('real.mobile.index', [
            'mobiles' => auth()->user()
                ->real->phones()
                ->with(['reals'])->get()
        ]);

    }

    public function create()
    {

        return view('real.mobile.create');

    }

    public function store(MobileRequest $request)
    {

        $mobile = Phone::create(['phone' => $request->mobile]);

        if($request->default) {

            foreach (auth()->user()->real->phones as $phone) {

                auth()->user()->real->phones()->updateExistingPivot($phone->id, ['default' => false]);

            }

            $mobile->reals()->attach(auth()->user()->real->id,['default' => true]);

            session()->flash('success', __('personal/mobile.created_default'));

        }

        else {

            $mobile->reals()->attach(auth()->user()->real->id,['default' => false]);

            session()->flash('success', __('personal/mobile.created'));

        }

        return redirect()->route('phone.index');
    }

    public function edit(Phone $phone)
    {

        return view('real.mobile.edit',compact('phone'));

    }

    public function update(MobileRequest $request,Phone $phone)
    {

        $phone->update(['phone' => $request->mobile]);

        if($request->default) {

            foreach (auth()->user()->real->phones as $mobile) {

                auth()->user()->real->phones()->updateExistingPivot($mobile->id, ['default' => false]);

            }

            auth()->user()->real->phones()->updateExistingPivot($phone->id, ['default' => true]);

            session()->flash('success', __('personal/mobile.updated_default'));


        }
        else {

            session()->flash('success', __('personal/mobile.updated'));

        }

        return redirect()->route('phone.index');

    }

    public function destroy(Phone $phone)
    {

        if ($phone->reals[0]->pivot->default) {

            session()->flash('danger', __('personal/mobile.not_deleted'));

        }
        else {

            auth()->user()->real->phones()->detach($phone->id);

            $phone->delete();

            session()->flash('success', __('personal/mobile.deleted'));

        }

        return redirect()->route('phone.index');

    }
}
