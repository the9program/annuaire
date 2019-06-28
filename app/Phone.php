<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $phone
 * @property Real $reals
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Phone extends Model
{
    protected $fillable = ['phone'];

    public function reals()
    {
        return $this->belongsToMany(Real::class)->withPivot('default');
    }
}
