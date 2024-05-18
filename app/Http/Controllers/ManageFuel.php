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
        if($request->isMethod('POST')) { 
            $isFull = ($request->input('isFull') === "True") ? 1 : 0;
            if ($request->input('startNewCalculation') === "True") {
                $isStartOfCalc = 1;
                $isFull = 1;    //Ayto giati an to isStartOfCalculating einai true tote anagkastika kai to isFull prepei na einai true
            } else {
                $isStartOfCalc = 0;
            }
            print($isFull);
            $gas = Gas::Create([
                'vehicle_id' => $vehicles->id,
                'km' => $request->input('km'),
                'lt' => $request->input('fuelAmound'),
                'isFull' => $isFull,
                'isStartOfCalculating' => $isStartOfCalc
            ]);
        }
        $gas = Gas::where('vehicle_id',$vehicles->id)->orderBy('created_at','desc')->get();
        return view('fuel-consumption',compact('vehicles','gas'));
    }
}
