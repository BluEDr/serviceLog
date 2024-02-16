<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Junction_service_proc_vehicle extends Model
{
    use HasFactory;
    
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function service_procedure()
    {
        return $this->belongsTo(service_procedure::class);
    }

}
