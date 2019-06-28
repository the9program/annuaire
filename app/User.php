<?php

namespace App;

use App\Notifications\Personal\ResetPasswordNotification;
use App\Notifications\Personal\VerifyEmail;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $avatar
 * @property string $email
 * @property string $password
 * @property int $category_id
 * @property string $remember_token
 * @property Carbon $email_verified_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Category $category
 * @property Role $roles
 * @property Token $tokens
 * @property Creator $creator
 * @property Creator $created_by
 * @property Real $real
 */

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'avatar', 'email', 'password', 'category_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function creator()
    {
        return $this->belongsTo(Creator::class,'creator_id');
    }

    public function created_by()
    {
        return $this->belongsTo(Creator::class,'created_id');
    }

    public function real()
    {
        return $this->hasOne(Real::class);
    }

    // operations

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

}
