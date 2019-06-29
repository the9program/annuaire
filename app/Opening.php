<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Carbon $lun_from
 * @property Carbon $lun_to
 * @property Carbon $sam_from
 * @property Carbon $sam_to
 * @property Carbon $dim_from
 * @property Carbon $dim_to
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Clinical $clinical
 */
class Opening extends Model
{

    protected $fillable = [
        'lun_from', 'lun_to', 'sam_from', 'sam_to', 'dim_from', 'dim_to'
    ];

    public function clinical()
    {
        return $this->hasOne(Clinical::class);
    }

}
