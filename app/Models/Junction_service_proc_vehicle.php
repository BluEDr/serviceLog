<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Junction_service_proc_vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['vehicle_id', 'service_procedure_id','km_service', 'km_for_next_service', 'months_for_next_service', 'more_details'];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function service_procedure()
    {
        return $this->belongsTo(service_procedure::class);
    }

}
