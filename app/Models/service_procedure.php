<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_procedure extends Model
{
    use HasFactory;
    
    public function junction_service_proc_vehicle()
    {
        return $this->belongsTo(Junction_service_proc_vehicle::class);
    }

    public function vehicle() //many to many relationship with vehicle
    {
        return $this->belongsToMany(Vehicle::class);
    }
}
