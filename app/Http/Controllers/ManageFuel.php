<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Vehicle;
use App\models\Gas_type;
use App\models\Gas;
use Auth;

class ManageFuel extends Controller
{
    public function fuel_consumption($id, Request $request) {        
        $Uid = Auth::id();
        $gas_t = Gas_type::all();
        $vehicles = Vehicle::with('user','gas_type')->where('user_id',$Uid)->find($id);
        if($vehicles == null)
            return Redirect::route('index')->withErrors('Error, no data to illustrate.');
        if($request->isMethod('POST')) { //TODO: na ftiakso edo tin kataxorisi toy gas
            $gas = new Gas();
            $gas->vehicle_id = $vehicles->id;
            $gas->km = 11112;
            $gas->lt = 1112;
            $gas->save();
        }
        return view('fuel-consumption',compact('vehicles'));
    }
}
