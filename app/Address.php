<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property boolean $default
 * @property string $address
 * @property int $build
 * @property int $floor
 * @property int $apt_nbr
 * @property int $zip
 * @property int $real_id
 * @property int $city_id
 * @property string $full_address
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property City $city
 * @property Real $real
 */
class Address extends Model
{

    protected $fillable = ['default', 'address', 'build', 'floor', 'apt_nbr', 'zip', 'city_id', 'real_id'];

    protected $table = 'addresses';

    public function getFullAddressAttribute()
    {

        $return =  $this->build . ', ' . $this->address . ', ';

        if($this->floor){
            $return .= __('validation.attributes.floor') . ' : ' . $this->floor . ', ' . __('validation.attributes.apt_nbr') . ' : ' . $this->apt_nbr . '. ';
        }

        $return .=  $this->city->city;

        return $return;
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function real()
    {
        return $this->belongsTo(Real::class);
    }
}
