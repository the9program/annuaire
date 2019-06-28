<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $creator_id
 * @property int $created_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property User $creator
 * @property User $created_by
 */
class Creator extends Model
{
    protected $fillable = ['creator_id', 'created_id'];

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class,'created_id');
    }
}
