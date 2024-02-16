<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['brand', 'model', 'plate_number', 'user_id']; //TODO: na to synexiso edo auto me to fillable opos kai sta ypolypa models
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); //edo grafo to user_id gia na kano poio sygkekrimeno se poio reference key anaferomai afoy ston idio pinaka exo dyo kseno kleidi poy dixnoyn kai ta dyo ston idio pinaka (Users)
    }

    public function mechanic()
    {
        return $this->belongsTo(User::class, 'mechanic_id');
    }

    public function service_procedure() //many to many relationchip with service_procedure
    {
        return $this->belongsToMany(service_procedure::class);
    }
}
