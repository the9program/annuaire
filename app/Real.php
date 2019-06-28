<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $cin
 * @property string $last_name
 * @property string $first_name
 * @property boolean $gender
 * @property Carbon $birth
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property User $user
 * @property Phone $phones
 * @property Address $addresses
 */
class Real extends Model
{
    protected $fillable = ['cin', 'last_name', 'first_name', 'gender', 'birth', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function phones()
    {
        return $this->belongsToMany(Phone::class)->withPivot('default');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
