<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $fillable = [
        'division',
        'name',
        'loc_name'
    ];

    public function incident()
    {
        return $this->hasMany(Incident::class, 'location');
    }
}
