<?php
/**
 * Created by PhpStorm.
 * User: LY
 * Date: 26/06/2019
 * Time: 0:28
 */

namespace App\Repository\Personal;


use App\Http\Requests\Personal\Real\ParamsRequest;

class RealRepository
{
    public function updateReal(ParamsRequest $request)
    {
        $real = auth()->user()->real;

        if ($real->cin && is_null($request->cin)) {
            return $real->update($request->all([
                    'last_name', 'first_name', 'gender', 'birth'
                ]));
        }

        return $real->update($request->all([
                'cin', 'last_name', 'first_name', 'gender', 'birth'
            ]));
    }
}