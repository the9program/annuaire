<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $category
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Role $roles
 * @property User $users
 * @property Token $tokens
 */
class Category extends Model
{

    protected $fillable = ['category'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

}
