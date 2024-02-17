<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class HomeService extends Controller
{
    public function index(Request $request) {

        $id = Auth::user()->id;
        $vehicles = Vehicle::with('user')->where('user_id',$id)->get();
        if($request->isMethod('post')) {
            $validatedData = $request->validate([
                'brand' => 'required | string',
                'km' => 'numeric'
            ], [
                'brand.required' => 'brand required',
                'km.numeric' => 'Wrong value in km'
            ]);

            // $brand = $request->input('brand');
            $newData = Vehicle::create([
                'brand' => $request->input('brand'),
                'model' => $request->input('model'),
                'plate_number' => $request->input('plate'),
                'registration_month' => ($request->input('month') == '-') ? null : $request->input('month'),
                'registration_year' => ($request->input('year') == '-') ? null : $request->input('year'),
                'color' => ($request->input('color') == '-') ? null : $request->input('color'), 
                'vehicle_type' => $request->input('vehicleType'),
                'km' => $request->input('km'),
                'user_id' => $id, // Set the user_id to the currently authenticated user's ID
            ]);


            $vehicles = Vehicle::with('user')->where('user_id',$id)->get();
        }   
        return view('welcome',compact('vehicles'));
    }

    public function delete_vehicle($id) {
         // Find the row by ID
         $row = Vehicle::find($id);

         // Check if the row exists
         if (!$row) {
            return redirect()->back()->withErrors('Vehicle not found :(');
         }
 
         // Check if the authenticated user is authorized to delete the row
         if ($row->user_id !== Auth::user()->id) {
             return redirect()->back()->withErrors('You have no access for this.');
         }
 
         // Attempt to delete the row
        $row->delete();
        
        return redirect()->back();
         
    }
} //test
