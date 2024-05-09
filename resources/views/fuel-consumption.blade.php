@extends('layouts.app')
@section('content')
{{-- to if apo kato einai kapos anoysio afoy pernaei prota apo to middleware(Auth) --}}
  
{{-- {{($vehicles->gas_type != null) ? $vehicles->gas_type->name : 'no gas added.'}} --}}
<h1> Manage your service here from {{$vehicles->brand}}</h1>

<div class='main-welcome'>
    <div class='welcome-75-div'>
            <table class="table table-striped">
                <tr>
                    <th>???---???</th>
                </tr>
                <tr>
                    <td> ??? </td>
                    
                </tr>
            </table>

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
        <form method="post" action="">
            @csrf
            <div id="items">
                <h5>Km<span style="color: red">*</span></h5>
                <input type="text" name="km" id="km" placeholder="Service km">
                <h5>liters/kwh<span style="color: red">*</span></h5>
                <input type="text" name="fuelAmound" id="fuelAmound" placeholder="fuel amound">
                <br>
                <h5>Description</h5>
                <input type="text" id="description" placeholder="Write your description.">
                <br>
                <h5>Do you full your tank?</h5>
                <input type="radio" id="isFullTrue" name="isFull">
                <label for="isFullTrue">Yes</label>
                <input type="radio" id="isFullFalse" name="isFull" checked>
                <label for="isFullFalse">No</label>
            </div>            
            <input class="btn btn-primary" type="submit" value="Submit" style="margin-top: 5px">
        </form>
    </div>
</div>
@endsection