<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $city
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Address $addresses
 */
class City extends Model
{
    protected $fillable = ['city'];

    public $timestamps = false;

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
