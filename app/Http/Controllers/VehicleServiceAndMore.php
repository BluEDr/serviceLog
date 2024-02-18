<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Gas_type;
use Auth;


class VehicleServiceAndMore extends Controller
{
    public function vehicleMore($id) {
        $Uid = Auth::id();
        $vehicles = Vehicle::where('user_id',$Uid)->where('id',$id)->get();
        if($vehicles->isEmpty()) 
            return back()->withErrors('Error, no data to illustrate.');
        return view('vehicle-more',compact('vehicles'));
    }
}
