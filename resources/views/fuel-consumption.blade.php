@extends('layouts.app')
@section('content')

<h1> Fuel Consumption calculator for {{$vehicles->brand}} {{$vehicles->model}}: <span id="fCunsumption" style="color:red; font-weight: bold">-<span></h1>

<div class='main-welcome'>
    <div class='welcome-75-div'>
            <table class="table table-striped" style="text-align: center">
                <tr>
                    <th>km</th>
                    <th>lt</th>
                    <th>isFull</th>
                    <th>isStartOfCalculating</th>
                    <th>delete</th>
                </tr>
                    @foreach($gas as $collection)
                        @if(session('lastStartOfCalcId'))
                            @if($collection->km >= session('lastStartOfCalcId'))
                                <tr class="table-primary">
                            @else
                                <tr>
                            @endif   
                        @else
                            <tr>
                        @endif
                            <td> {{$collection->km}} </td>
                            <td> {{$collection->lt}} </td>
                            <td> 
                                {{($collection->isFull===1) ? "Yes" : "No"}} 
                            </td>
                            <td> 
                                @if ($collection->isStartOfCalculating === 1) 
                                    <span class='badge bg-info'>Start New Meassure</span>
                                @else
                                    No        
                                @endif
                            </td>
                            <td style="color:red"><a class="btn btn-close delete-btn" role="button" aria-pressed="true" href="{{route('del-fuel-consumption',['id'=>$collection->id])}}"></a></td>
                        </tr>
                    @endforeach 
            </table>
            <br>
            @if ($gas->count() < 1)
                <p>There is no imported data to illustrate. </p>
            @endif

    </div>
    <div class='container welcome-25-div'>
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
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="popover" data-bs-content="Here, you can track the fuel consumption of your vehicle. To begin, select the radio button to start a new calculation. This marks the starting point of your measurement. You can refill your tank as many times as needed. To obtain a measurement result, make sure to completely fill your vehicle’s tank and select the "Full Tank" radio button. You can repeat this process multiple times within a single measurement period. For more accurate results, it's recommended to fill your tank multiple times. Each time you fill your tank completely, the measurement will become more accurate. Be careful not to forget to record every time you refill your tank, whether it's a full refill or not.">
            How it works?
        </button>   
        <p style="color: red" id="errorMsg1"></p>
        <p style="color: red" id="errorMsg2"></p>
        <p style="color: red" id="errorMsg3"></p>
        <p style="color: red" id="errorMsgNeedGraterKmValue"></p>

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

        @if (session('errorMsgNeedGraterKmValue'))
            document.getElementById('errorMsgNeedGraterKmValue').innerHTML = "{{session('errorMsgNeedGraterKmValue')}}";
        @endif
    });
</script>



@endsection