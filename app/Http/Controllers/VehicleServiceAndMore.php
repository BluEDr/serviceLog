<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Gas_type;
use Auth;
use Illuminate\Support\Facades\Redirect;



class VehicleServiceAndMore extends Controller
{
    public function vehicleMore($id) {
        $Uid = Auth::id();
        $vehicles = Vehicle::with('user','gas_type')->where('user_id',$Uid)->find($id);
        if($vehicles == null) 
            return Redirect::route('index')->withErrors('Error, no data to illustrate.');
        return view('vehicle-more',compact('vehicles'));
    } 

    public function editVehicle($id) {        
        $Uid = Auth::id();
        $gas_t = Gas_type::all();
        $vehicles = Vehicle::with('user','gas_type')->where('user_id',$Uid)->find($id);
        if($vehicles == null) 
            return Redirect::route('index')->withErrors('Error, no data to illustrate.');
        return view('edit-vehicle',compact('vehicles'),compact('gas_t'));
    }
}
