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

    public function editVehicle($id,Request $request) {   
        $Uid = Auth::id();
        $gas_t = Gas_type::all();
        if($request->isMethod('post')) {
            $validatedData = $request->validate([
                'brand' => 'required | string',
                'km' => 'nullable | numeric',
                'cc' => 'nullable | numeric',
                'hp' => 'nullable | numeric',
                'registration_year' => ['required', function ($attribute, $value, $fail) {
                    if ($value !== '-' && !is_numeric($value)) {
                        $fail("Wrong year value.");
                    }
                }],
                'registration_month' => ['required', function ($attribute, $value, $fail) {
                    if ($value !== '-' && !is_numeric($value)) {
                        $fail("Wrong month value.");
                    }
                }],
            ], [
                'brand.required' => 'brand required',
                'km.numeric' => 'Wrong value in km',
                'cc.numeric' => 'Wrong value in cc',
                'hp.numeric' => 'Wrong value in hp',
            ]);   
        }   
        //TODO: continue with update in case that the user change the data 
        $vehicles = Vehicle::with('user','gas_type')->where('user_id',$Uid)->find($id);
        if($vehicles == null) 
            return Redirect::route('index')->withErrors('Error, no data to illustrate.');
        return view('edit-vehicle',compact('vehicles'),compact('gas_t'));
    }
}
