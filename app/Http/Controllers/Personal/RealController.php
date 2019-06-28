<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class RealController extends Controller
{

    public function profile()
    {

        return view('real.profile',['user' => auth()->user()]);

    }
}
