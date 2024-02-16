<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class HomeService extends Controller
{
    public function index() {

        $id = Auth::user()->id;
        $vehicles = Vehicle::with('user')->where('user_id',$id)->get();
        return view('welcome',compact('vehicles'));
    }
} //test
