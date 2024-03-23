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
        $vehicles = Vehicle::with('user','gas_type')->where('user_id',$Uid)->find($id);
        if($vehicles == null) 
            return Redirect::route('index')->withErrors('Error, no data to illustrate.');
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
            if ($this->update($request, $vehicles)) { //if the function return true it means that the update done.
                return redirect()->back()->with('success', 'Record updated successfully.');
            }
        }
        return view('edit-vehicle',compact('vehicles'),compact('gas_t'));
    }
    private function update($request, $vehicles) {
        $temp = false;
        if (isset($request->brand) && ($vehicles->brand != $request->brand)) {
            $vehicles->brand = $request->input('brand');
            $temp = true;
        }
        if (isset($request->model) && ($vehicles->model != $request->model)) {
            $vehicles->model = $request->input('model');
            $temp = true;
        }
        if (isset($request->plate_number) && ($vehicles->plate_number != $request->plate_number)) {
            $vehicles->plate_number = $request->input('plate_number');
            $temp = true;
        }
        if (isset($request->vehicle_type) && ($vehicles->vehicle_type != $request->vehicle_type)) {
            $vehicles->vehicle_type = $request->input('vehicle_type');
            $temp = true;
        }
        if (isset($request->fuel) && ($vehicles->gas_type_id != $request->fuel)) {
            if($request->fuel==='-')
                $vehicles->gas_type_id = null;
            else
                $vehicles->gas_type_id = $request->input('fuel');
            $temp = true;
        }
        if (isset($request->km) && ($vehicles->km != $request->km)) {
            $vehicles->km = $request->input('km');
            $temp = true;
        }
        if (isset($request->cc) && ($vehicles->cc != $request->cc)) {
            $vehicles->cc = $request->input('cc');
            $temp = true;
        }
        if (isset($request->hp) && ($vehicles->hp != $request->hp)) {
            $vehicles->hp = $request->input('hp');
            $temp = true;
        }
        if (isset($request->color) && ($vehicles->color != $request->color)) {
            if ($request->color==='-')
                $vehicles->color = null;
            else
                $vehicles->color = $request->input('color');
            $temp = true;
        }
        if (isset($request->registration_month) && ($vehicles->registration_month != $request->registration_month)) {
            if ($request->registration_month === '-')
                $vehicles->registration_month = null;
            else
                $vehicles->registration_month = $request->input('registration_month');
            $temp = true;
        }
        if (isset($request->registration_year) && ($vehicles->registration_year != $request->registration_year)) {
            if ($request->registration_year === '-')
                $vehicles->registration_year = null;
            else
                $vehicles->registration_year = $request->input('registration_year');
            $temp = true;
        }
        if($temp) {
            $vehicles->save();
            return true;
        }
        return false;
    }
    public function addService($id,Request $request) { 
        $Uid = Auth::id();
        $gas_t = Gas_type::all();
        $vehicles = Vehicle::where('user_id',$Uid)->find($id);
        // dd($vehicles);
        if($vehicles == null) 
            return Redirect::route('index')->withErrors('Error, no data to illustrate.');
        return view('add-service', compact('vehicles'));
        //TODO: na synexiso tin diadikasia gia to add service
    }
}
