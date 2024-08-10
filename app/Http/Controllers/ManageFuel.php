<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Vehicle;
use App\Models\Gas_type;
use App\Models\Gas;
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
            
            $gas_5 = Gas::where('vehicle_id',$vehicles->id)->orderBy('km','desc')->first();
            if((!$gas_5) || ($request->input('km') > $gas_5->km)) {
                $gas = Gas::Create([
                    'vehicle_id' => $vehicles->id,
                    'km' => $request->input('km'), 
                    'lt' => $request->input('fuelAmound'),
                    'isFull' => $isFull,
                    'isStartOfCalculating' => $isStartOfCalc
                ]);
                session()->forget('errorMsgNeedGraterKmValue'); //kanonika ayto einai by default alla stin sygkekrimeni periptosi otan steilei meta to lathos tin sosti timi sta km kai oxi leigotera apo tin teleytaia fora me ayto den stelnete to session se antitheti periptosi xoris auto mono gia tin proti fora meta to lathos to session stelnete
            } else { 
                session()->flash('errorMsgNeedGraterKmValue','The km value that you are trying to insert is lower than the last one. Try again');
            }
        }
        $gas = Gas::where('vehicle_id',$vehicles->id)->orderBy('created_at','desc')->get();
        $gas_2 = Gas::where('vehicle_id',$vehicles->id)->where('isStartOfCalculating',1)->orderBy('km','desc')->first();
        $gas_4 = Gas::where('vehicle_id',$vehicles->id)->where('isFULL',1)->orderBy('km','desc')->first();
        if(isset($gas_2)) {
            session()->flash('lastStartOfCalcId',$gas_2->km);
            $gas_3 = Gas::where('vehicle_id',$vehicles->id)->where('km','>',$gas_2->km)->where('km','<=',$gas_4->km)->orderBy('km','desc')->get();
            if ($gas_3->count() !== 0)
                session()->flash('fuelConsResult', ($this->getLiters($gas_3) * 100) / $this->getKms($gas_3,$gas_2));
        } 
        return view('fuel-consumption',compact('vehicles','gas','gas_2'));
    }

    private function getKms($gas_3,$gas_2) {
        $grater = 0;
        foreach ($gas_3 as $collection) {
            if($collection->km > $grater)
                $grater=$collection->km;
        }
        return $grater - $gas_2->km;
    }

    private function getLiters($gas_3) {
        $curr = 0;
        foreach ($gas_3 as $collection) {
            $curr+=$collection->lt;
        }
        return $curr;
    }
 
    public function del_fuel_consumption($id) {
        $gas = Gas::where('id',$id);
        $gas->delete();
        return redirect()->back();
    }
}
