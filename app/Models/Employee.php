<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $fillable = [
        'badge',
        'name',
        'designation'
    ];

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }

    public function officer()
    {
        return $this->belongsTo(Incident::class);
    }


}
