<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gas extends Model
{
    use HasFactory;
    protected $table = 'gasses';
    protected $fillable = ['vehicle_id','km', 'lt', 'kwh', 'isFull', 'isStartOfCalculating'];
    public function vehicle() {
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }

}
