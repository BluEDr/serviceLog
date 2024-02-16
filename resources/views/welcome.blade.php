@extends('layouts.app')

@section('content')
{{-- to if apo kato einai kapos anoysio afoy pernaei prota apo to middleware(Auth) --}}
@if(Auth::check())
<p>Welcome {{Auth::user()->name}}</p>
@else
<p>Welcome!</p>
@endif
<div class='main-welcome'>
    <div class='welcome-75-div'>
        <h4><strong>Your vehicle data:</strong></h4>
        @if($vehicles->count() > 0)
            <p>there is</p>
            @foreach($vehicles as $v)
            <p>{{$v->brand}}</p>
            <p style="color: red">{{$v->user->name}}</p>
            @endforeach
        @else
            <p>There is no vehicle data inserted</p>
        @endif
    </div>
    <div class='welcome-25-div'>
        <h4><strong>Add a new Vehicle here:</strong></h4>
        <form action="">
            <h5>Fill your plate number:</h5>
            <input type="text" name="plate" id="plate">
            <h5>Write your vehicles brand: <span style="color: red">*</span></h5>
            <input type="text" name="brand" id="brand">
            <h5>Write your vehicles model:</h5>
            <input type="text" name="model" id="model">
            <div>
                <h5>Car registration year:</h5>
                <select name="year">
                    @for ($year = date('Y'); $year >= 1960; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
            <div>
                <h5>Select your Vehicle type: <span style="color: red">*</span></h5>
                <input type="radio" name="vehicleType" id="car" value="Car" checked>
                <label for="car">Car</label>
            </div>
            <div>
                <input type="radio" name="vehicleType" id="moto" value="Moto">
                <label for="moto">Moto</label>
            </div>
            <div>
                <input type="radio" name="vehicleType" id="truck" value="Truck">
                <label for="truck">Truck</label>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
@endsection