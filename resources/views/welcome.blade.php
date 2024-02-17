@extends('layouts.app')

@section('content')
{{-- to if apo kato einai kapos anoysio afoy pernaei prota apo to middleware(Auth) --}}
<div class='main-welcome'>
    <div class='welcome-75-div'>
        <h4><strong>Your vehicle data:</strong></h4>
        @if($vehicles->count() > 0)
            <table class="table table-striped">
            <th>Brand</th><th>Model</th><th>Plate-Number</th><th>Km</th><th>Color</th><th>Vehicle Type</th><th>Delete</th>
            @foreach($vehicles as $v)
            <tr>
                <td>
                    {{$v->brand}}
                </td> 
                <td>
                    @if ($v->model != null)
                        {{$v->model}}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($v->plate_number != null)
                        {{$v->plate_number}}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($v->km != null)
                        {{$v->km}}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($v->color != null)
                        {{$v->color}}
                    @else
                        -
                    @endif
                </td>
                <td>
                    @if ($v->vehicle_type != null)
                        {{$v->vehicle_type}}
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{route('delete-vehicle',['id' => $v->id])}}"><button type="button" class="btn-close" aria-label="Close"></button> </a>
                </td>
            </tr>
            @endforeach
            </table>
        @else
            <p>There is no vehicle data inserted</p>
        @endif
    </div>
    <div class='welcome-25-div'>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h4><strong>Add a new Vehicle here:</strong></h4>
        <form method="post" action="">
            @csrf
            <h5>Fill your plate number:</h5>
            <input type="text" name="plate" id="plate">
            <h5>Write your vehicles brand: <span style="color: red">*</span></h5>
            <input type="text" name="brand" id="brand">
            <h5>Write your vehicles model:</h5>
            <input type="text" name="model" id="model">
            <h5>How many kilometers has your vehicle?:</h5>
            <input type="text" name="km" id="km">
            <div>
                <h5>Vehicle registration:</h5>
                <select name="month">
                    <option value="-" selected>Month</option>
                    @for($month=1; $month<13; $month++)
                        <option value="{{ $month }}"> {{$month}} </option>
                    @endfor
                </select>
                <select name="year">
                    <option value="-" selected>Year</option>
                    @for ($year = date('Y'); $year >= 1960; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
                <h5> Color </h5>
                <select name="color">
                    <option value="-" selected>-</option>
                    <option value="black">Black</option>
                    <option value="white">White</option>
                    <option value="red">Red</option>
                    <option value="yellow">Yellow</option>
                    <option value="blue">Blue</option>
                    <option value="grey">Grey</option>
                    <option value="silver">Silver</option>
                    <option value="green">Green</option>
                    <option value="brown">Brown</option>
                    <option value="purple">Purple</option>
                    <option value="gold">Gold</option>
                    <option value="orange">Orange</option>
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