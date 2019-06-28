<?php

namespace App\Http\Controllers\Personal;

use App\Http\Requests\Personal\Real\ParamsRequest;
use App\Http\Controllers\Controller;
use App\Repository\Personal\RealRepository;
use App\Repository\Personal\UserRepository;
use Illuminate\Support\Facades\Storage;

class ParamsController extends Controller
{

    public function paramsForm()
    {

        return view('real.params');

    }

    public function params(ParamsRequest $request,UserRepository $userRepository, RealRepository $realRepository)
    {


        if(!is_null($request->avatar)) {

            $userRepository->updateAvatar($request->file('avatar'));

        }

        $realRepository->updateReal($request);

        session()->flash('success', __('personal/real.updated'));

        return back();
    }
}
