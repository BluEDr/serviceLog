<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Vehicle;
use App\models\Gas_type;
use Auth;

class ManageFuel extends Controller
{
    public function fuel_consumption($id) {        
        $Uid = Auth::id();
        $gas_t = Gas_type::all();
        $vehicles = Vehicle::with('user','gas_type')->where('user_id',$Uid)->find($id);
        if($vehicles == null)
            return Redirect::route('index')->withErrors('Error, no data to illustrate.');
        return view('fuel-consumption',compact('vehicles'));
    }
}
