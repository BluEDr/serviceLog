@extends('layouts.app')

@section('content')
{{-- to if apo kato einai kapos anoysio afoy pernaei prota apo to middleware(Auth) --}}
<div class='main-welcome'>
    <table class="table table-striped">
        <th>Brand</th><th>Model</th><th>Plate number</th><th>Vehicle Type</th><th>Mechanic</th><th>Fuel</th>
        <tr>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->brand}}" value="{{$vehicles->brand}}">
            </td>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->model}}" value="{{$vehicles->model}}">
            </td>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->plate_number}}" value="{{$vehicles->plate_number}}">
            </td>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->vehicle_type}}" value="{{$vehicles->vehicle_type}}">
            </td>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->mechanic_id}}" value="{{$vehicles->mechanic_id}}" disabled>
            </td>
            <td>
                <select class="form-control" name="fuel">
                    <option value="-" {{($vehicles->gas_type==null) ? "checked" : ""}}>-</option>
                    @foreach ($gas_t as $collection)
                        dd($vehicles->gas_type) //TODO: na kano edo checked an einai stin basi epilegmeni sygkekrimeni benzini
                        <option value="{{$collection->name}} {{($vehicles->gas_type == $collection) ? "checked" : ""}}">{{$collection->name}}</option>
                    @endforeach

                  </select>
                <input class="dropdown-menu" type="dropdown" placeholder="{{($vehicles->gas_type != null) ? $vehicles->gas_type->name : '-'}}" value="{{($vehicles->gas_type != null) ? $vehicles->gas_type->name : '-'}}">
            </td>
        </tr><th>km</th><th>cc</th><th>Horse Power(hp)</th><th>Color</th><th>Registration Month</th><th>Registration Year</th>
        <tr>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->km}}" value="{{$vehicles->km}}">
            </td>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->cc}}" value="{{$vehicles->cc}}">
            </td>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->hp}}" value="{{$vehicles->hp}}">
            </td>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->color}}" value="{{$vehicles->color}}">
            </td>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->registration_month}}" value="{{$vehicles->registration_month}}">
            </td>
            <td>
                <input class="form-control" type="text" placeholder="{{$vehicles->registration_year}}" value="{{$vehicles->registration_year}}">
            </td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-secondary">Update</button>
            </td>
        </tr>
    </table>
</div>
@endsection