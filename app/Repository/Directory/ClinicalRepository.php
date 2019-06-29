<?php

namespace App\Repository\Directory;

use App\Address;
use App\Clinical;
use App\Http\Requests\Directory\ClinicalRequest;
use App\Opening;

class ClinicalRepository
{

    public function store(ClinicalRequest $request,Address $address,Opening $opening,array $services)
    {
        $request->request->add(['default' => true]);

        $address = $address->create($request->all([
            'default', 'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id'
        ]));

        $opening = $opening->create($request->all([
            'lun_from', 'lun_to', 'sam_from', 'sam_to', 'dim_from', 'dim_to'
        ]));

        $clinical = $address->clinical()->create([
            'name'                  => $request->name,
            'speech'                => $request->speech,
            'visit'                 => 0,
            'number_emergency'      => $request->number_emergency,
            'creator_id'            => auth()->id(),
            'opening_id'            => $opening->id
        ]);

        $clinical->services()->sync($services);

        return $clinical;
    }

    public function update(ClinicalRequest $request,Clinical $clinical,array $services)
    {
        $l = $clinical->update([
            'name'                  => $request->name,
            'speech'                => $request->speech,
            'visit'                 => 0,
            'number_emergency'      => $request->number_emergency,
        ]);

        $a = $clinical->address->update($request->all([
            'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id'
        ]));

        $o = $clinical->opening->update($request->all([
            'lun_from', 'lun_to', 'sam_from', 'sam_to', 'dim_from', 'dim_to'
        ]));


        $s = $clinical->services()->sync($services);

        if ($l && $a && $o){

            return true;

        }

        return false;
    }

    public function destroy(Clinical $clinical)
    {
        $clinical->opening()->delete();
        $clinical->address()->delete();
        $clinical->services()->detach();
        return $clinical->delete();
    }

}