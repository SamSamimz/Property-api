<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function broker() {
        return $this->belongsTo(Broker::class);
    }
    public function characteristic() {
        return $this->hasMany(PropertyCharacteristic::class);
    }

}
