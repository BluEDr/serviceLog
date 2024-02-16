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
        $validatedData = $request->validate([
            'brand' => 'required | string'
        ], [
            'brand.required' => 'brand required'
        ]);

$brand = $request->input('brand');
        $newData = Vehicle::create([
            'brand' => $brand,
            'model' => $request->input('model'),
            'plate' => $request->input('plate'),
            'user_id' => $id, // Set the user_id to the currently authenticated user's ID
        ]);


        $vehicles = Vehicle::with('user')->where('user_id',$id)->get();
        return view('welcome',compact('vehicles'));
    }
} //test
