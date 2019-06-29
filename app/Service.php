<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $icon
 * @property string $service
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Clinical $clinics
 */
class Service extends Model
{
    protected $fillable = ['icon', 'service'];

    public $timestamps = false;

    public function clinics()
    {
        return $this->belongsToMany(Clinical::class);
    }
}
