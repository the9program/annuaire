<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $speech
 * @property integer $visit
 * @property string $number_emergency
 * @property int $address_id
 * @property int $creator_id
 * @property int $opening_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Address $address
 * @property User $creator
 * @property Opening $opening
 * @property Service $services
 */
class Clinical extends Model
{

    protected $table = 'clinics';

    protected $fillable = ['name', 'speech', 'visit', 'number_emergency', 'address_id', 'creator_id', 'opening_id'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function opening()
    {
        return $this->belongsTo(Opening::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
