<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $token
 * @property string $email
 * @property int $creator_id
 * @property int $category_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property User $creator
 * @property Category $category
 */
class Token extends Model
{
    use Notifiable;

    protected $fillable = ['token', 'email', 'creator_id', 'category_id'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
