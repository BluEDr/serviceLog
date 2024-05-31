@extends('layouts.app')

@section('content')
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
<div class="centered-h1">
    <h1>Edit your {{$vehicles->brand}} {{$vehicles->model}} data.</h1>
</div>
<div class='main-welcome'>  
    <div class='edit-form'>
        <form method="post" action="" >
            @csrf
            <table class="table table-striped">
                <th>Brand</th><th>Model</th><th>Plate number</th><th>Vehicle Type</th><th>Mechanic</th><th>Fuel</th>
                <tr>
                    <td>
                        <input class="form-control" type="text" name="brand" placeholder="{{$vehicles->brand}}" value="{{$vehicles->brand}}">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="model" placeholder="{{$vehicles->model}}" value="{{$vehicles->model}}">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="plate_number" placeholder="{{$vehicles->plate_number}}" value="{{$vehicles->plate_number}}">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="vehicle_type" placeholder="{{$vehicles->vehicle_type}}" value="{{$vehicles->vehicle_type}}">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="mechanic_id" placeholder="{{$vehicles->mechanic_id}}" value="{{$vehicles->mechanic_id}}" disabled>
                    </td>
                    <td>
                        <select class="form-control" name="fuel">
                            <option value="-" {{($vehicles->gas_type==null) ? "selected" : ""}}>-</option>
                            @foreach ($gas_t as $collection)
                                <option value="{{$collection->id}}" {{($vehicles->gas_type == $collection) ? "selected" : ""}}>{{$collection->name}}</option>
                            @endforeach
                        </select>
                        <input class="dropdown-menu" type="dropdown" placeholder="{{($vehicles->gas_type != null) ? $vehicles->gas_type->name : '-'}}" value="{{($vehicles->gas_type != null) ? $vehicles->gas_type->name : '-'}}">
                    </td>
                </tr><th>km</th><th>cc</th><th>Horse Power(hp)</th><th>Color</th><th>Registration Month</th><th>Registration Year</th>
                <tr>
                    <td>
                        <input class="form-control" type="text" name="km" placeholder="{{$vehicles->km}}" value="{{$vehicles->km}}">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="cc" placeholder="{{$vehicles->cc}}" value="{{$vehicles->cc}}">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="hp" placeholder="{{$vehicles->hp}}" value="{{$vehicles->hp}}">
                    </td>
                    <td>
                        <select class="form-control" name="color">
                            <option value="-" {{($vehicles->color) ? 'selected' : ''}}>-</option>
                            <option value="black" {{($vehicles->color == 'black') ? 'selected' : ''}}>Black</option>
                            <option value="white" {{($vehicles->color == 'white') ? 'selected' : ''}}>White</option>
                            <option value="red" {{($vehicles->color == 'red') ? 'selected' : ''}}>Red</option>
                            <option value="yellow" {{($vehicles->color == 'yellow') ? 'selected' : ''}}>Yellow</option>
                            <option value="blue" {{($vehicles->color == 'blue') ? 'selected' : ''}}>Blue</option>
                            <option value="grey" {{($vehicles->color == 'grey') ? 'selected' : ''}}>Grey</option>
                            <option value="silver" {{($vehicles->color == 'silver') ? 'selected' : ''}}>Silver</option>
                            <option value="green" {{($vehicles->color == 'green') ? 'selected' : ''}}>Green</option>
                            <option value="brown" {{($vehicles->color == 'brown') ? 'selected' : ''}}>Brown</option>
                            <option value="purple" {{($vehicles->color == 'purple') ? 'selected' : ''}}>Purple</option>
                            <option value="gold" {{($vehicles->color == 'gold') ? 'selected' : ''}}>Gold</option>
                            <option value="orange" {{($vehicles->color == 'orange') ? 'selected' : ''}}>Orange</option>
                        </select>                </td>
                    <td>
                        <select class="form-control" name="registration_month">
                            <option value="-">Month</option>
                            @for($month=1; $month<13; $month++)
                                <option value="{{ $month }}" {{($vehicles->registration_month == $month) ? 'selected' : ''}}> {{$month}} </option>
                            @endfor
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="registration_year">
                            <option value="-">Year</option>
                            @for ($year = date('Y'); $year >= 1960; $year--)
                            <option value="{{ $year }}" {{($vehicles->registration_year == $year) ? 'selected' : ''}}> {{$year}} </option>
                            @endfor
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="btn btn-secondary" value="Update">
                        {{-- <input type="button" class="btn btn-secondary" value="Clear all"> --}}
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection