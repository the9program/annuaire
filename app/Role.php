<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $role
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Category $categories
 */
class Role extends Model
{
    protected $fillable = ['role'];

    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
