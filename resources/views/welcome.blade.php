@extends('layouts.app')
@section('content')
{{-- to if apo kato einai kapos anoysio afoy pernaei prota apo to middleware(Auth) --}}
  


<div class='main-welcome'>
    <div class='welcome-75-div'>
        <h4><strong>Your vehicle data:</strong></h4>
        @if($vehicles->count() > 0)
            <table class="table table-striped">
            <th>Brand</th><th>Model</th><th>Plate-Number</th><th>Km</th><th>Color</th><th>Vehicle Type</th><th>Gas Type</th><th style="text-align: center">Delete</th><th style="text-align: center">Edit</th><th style="text-align: center">New service</th><th style="text-align: center">Fuel consumption</th>
            @foreach($vehicles as $v)
            <tr>
                <td onclick="window.location='{{ route('vehicle-more', ['id' => $v->id]) }}';" style="cursor:pointer;">
                    {{$v->brand}}
                </td> 
                <td onclick="window.location='{{ route('vehicle-more', ['id' => $v->id]) }}';" style="cursor:pointer;">
                    @if ($v->model != null)
                        {{$v->model}}
                    @else
                        -
                    @endif
                </td>
                <td onclick="window.location='{{ route('vehicle-more', ['id' => $v->id]) }}';" style="cursor:pointer;">
                    @if ($v->plate_number != null)
                        {{$v->plate_number}}
                    @else
                        -
                    @endif
                </td>
                <td onclick="window.location='{{ route('vehicle-more', ['id' => $v->id]) }}';" style="cursor:pointer;">
                    @if ($v->km != null)
                        {{$v->km}}
                    @else
                        -
                    @endif
                </td>
                <td onclick="window.location='{{ route('vehicle-more', ['id' => $v->id]) }}';" style="cursor:pointer;">
                    @if ($v->color != null)
                        {{$v->color}}
                    @else
                        -
                    @endif
                </td>
                <td onclick="window.location='{{ route('vehicle-more', ['id' => $v->id]) }}';" style="cursor:pointer;">
                    @if ($v->vehicle_type != null)
                        {{$v->vehicle_type}}
                    @else
                        -
                    @endif
                </td>
                <td onclick="window.location='{{ route('vehicle-more', ['id' => $v->id]) }}';" style="cursor:pointer;">
                    {{$v->gas_type ? $v->gas_type->name : '-'}}
                </td>
                <td style="text-align: center">
<!-- Button to trigger the modal -->
                    @if ($v!=null)
                        <button type="button" class="btn-close delete-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$v->id}}" data-brand="{{$v->brand}}" arial-lebel="Close">   </button>    

                    @endif
                 </td>
                 <td style="text-align: center">
                     <a href="{{route('edit-vehicle',['id' => $v->id])}}"><img src="{{ asset('images/icons/pen.png') }}" alt="Edit"></a>
                 </td>
                 <td style="text-align: center">
                     <a href="{{route('add-service',['id' => $v->id])}}"><strong><img src="{{ asset('images/icons/calendar2-plus.svg') }}" alt="add-service"></strong></i></a>
                 </td>
                 <td style="text-align: center">
                     <a href="{{route('fuel-consumption',['id' => $v->id])}}"><strong><img src="{{ asset('images/icons/gas.png') }}" alt="fuel consumption"></strong></i></a>
                 </td>
                 {{-- TODO: edo apo pano na allakso to route --}}
            </tr>
            @endforeach
            </table>


        {{-- na ftiakso to delete modal na diagrafei otan patao to yes  --}}
        
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var deleteButtons = document.querySelectorAll('.delete-btn');
                    var itemIdElement = document.getElementById('itemId');
                    var itemBrandElement = document.getElementById('itemBrand');
            
                    deleteButtons.forEach(function(button) {
                        button.addEventListener('click', function() {
                            var itemId = button.getAttribute('data-id');
                            var itemBrand = button.getAttribute('data-brand');

                            confirmDeleteBtn.onclick = function() {
                                window.location.href = '{{ route('delete-vehicle', '') }}/' + itemId;
                            };
                            itemBrandElement.textContent = itemBrand;
                        });
                    });
                });
            </script>


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
            <h5> Fuel </h5>
            <select name="fuel">
                <option value="-" selected> - </option>
                @foreach($gas_t as $g)
                    <option value="{{$g->id}}">{{$g->name}}</option>
                @endforeach
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
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>
@include('templates.delete-modal')
@endsection
