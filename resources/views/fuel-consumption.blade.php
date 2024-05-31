@extends('layouts.app')
@section('content')


<h1> Fuel Consumption calculator for {{$vehicles->brand}} {{$vehicles->model}}: <span id="fCunsumption" style="color:red; font-weight: bold">-<span></h1>

<div class='main-welcome'>
    <div class='welcome-75-div'>
            <table class="table table-striped">
                <tr>
                    <th>km</th>
                    <th>lt</th>
                    <th>isFull</th>
                    <th>isStartOfCalculating</th>
                    <th>delete</th>
                </tr>
                    @foreach($gas as $collection)
                        <tr>
                            <td> {{$collection->km}} </td>
                            <td> {{$collection->lt}} </td>
                            <td> 
                                @if ($collection->isFull === 1) 
                                    Yes <span class='badge badge-success'>Success</span>
                                @else
                                    No        
                                @endif
                            </td>
                            <td> {{($collection->isStartOfCalculating===1) ? "Yes" : "No"}} </td>
                            <td style="color:red"><a href="{{route('del-fuel-consumption',['id'=>$collection->id])}}">del</a></td>
                        </tr>
                    @endforeach 
            </table>
            <br><br>
            @if (!isset($gas_2))
                <p>There is no imported data to illustrate. </p>
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
        <h4><strong>Add a new refueling here:</strong></h4>
        <p style="color: red" id="errorMsg1"></p>
        <p style="color: red" id="errorMsg2"></p>
        <p style="color: red" id="errorMsg3"></p>
        <form method="post" name="myForm" onsubmit="validateFuelConsumptionForm(event)" action="" >
            @csrf
            <div id="items">
                <h5>Do you want to start a new fuel consumption calculation? The fuel tank has to be full.</h5>
                <div>
                    <input type="radio" id="startNewCalculationYes" name="startNewCalculation" value="True">
                    <label for="startNewCalculationYes">Yes</label>
                    <input type="radio" id="startNewCalculationNo" name="startNewCalculation" value="False" checked>
                    <label for="startNewCalculationNo">No</label>
                </div>
                <h5>Do you full your tank?</h5>
                <input type="radio" id="isFullTrue" name="isFull" value="True">
                <label for="isFullTrue">Yes</label>
                <input type="radio" id="isFullFalse" name="isFull" value="False" checked>
                <label for="isFullFalse">No</label>
                </div>
                <h5>Km<span style="color: red">*</span></h5>
                <input type="text" name="km" id="km" placeholder="Service km">
                <h5>liters/kwh<span style="color: red">*</span></h5>
                <input type="text" name="fuelAmound" id="fuelAmound" placeholder="fuel amound">
                <br>
            <input class="btn btn-primary" type="submit" value="Submit" style="margin-top: 5px">
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('fuelConsResult'))
            document.getElementById('fCunsumption').innerHTML = Math.round(({{session('fuelConsResult')}} + Number.EPSILON) * 100)/100 + " lt/100km";
        @endif
    });
</script>



@endsection