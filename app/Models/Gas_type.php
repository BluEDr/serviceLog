<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gas_type extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
