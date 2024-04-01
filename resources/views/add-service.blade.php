@extends('layouts.app')
@section('content')
{{-- to if apo kato einai kapos anoysio afoy pernaei prota apo to middleware(Auth) --}}
  
{{-- {{($vehicles->gas_type != null) ? $vehicles->gas_type->name : 'no gas added.'}} --}}
<h1> Manage your service here from {{$vehicles->brand}}</h1>

<div class='main-welcome'>
    <div class='welcome-75-div'>
        <h4><strong>Your vehicle data:</strong></h4>
        
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
        <h4><strong>Add a new service here:</strong></h4>
        <form method="post" action="">
            @csrf
            <h2>Select a Service Procedure:</h2>
            <select id="serviceProcedureSelect">
                <option value="">Select a Service Procedure</option>
            </select>

            <script>
                // Embedding the PHP array into a JavaScript variable
                // const serviceProcOptions = @json($service_proc);

                // // Reference to the select element
                // const selectElement = document.getElementById('serviceProcedureSelect');

                // // Loop through the array and add options to the select element
                // serviceProcOptions.forEach(function(item) {
                //     const option = document.createElement('option');
                //     option.value = item.id; // Assuming 'id' is the key for the value
                //     option.text = item.name; // Assuming 'name' is the key for the name
                //     selectElement.appendChild(option);
                // });





                
                document.addEventListener('DOMContentLoaded', function() {  //TODO: prospatho na emfaniso tis times poy stelno apo to service_procedure db me js se dynamiko montelo dimioyrgontas kathe fora kainoyrio me to add item button
    // Embedding the PHP array into a JavaScript variable
    const serviceProcOptionsElement = @json($service_proc);
    console.log(serviceProcOptionsElement);
    if (serviceProcOptionsElement) {
        const serviceProcOptions = JSON.parse(serviceProcOptionsElement.textContent);

        // Reference to the select element
        const selectElement = document.getElementById('serviceProcedureSelect');

        // Loop through the array and add options to the select element
        serviceProcOptions.forEach(function(item) {
            const option = document.createElement('option');
            option.value = item.id; // Assuming 'id' is the key for the value
            option.text = item.name; // Assuming 'name' is the key for the name
            selectElement.appendChild(option);
        });
    } else {
        console.error('Service procedure data element not found.');
    }
});
            </script>
            <br><br><br>
            <div id="items">
                <h5>Km</h5>
                <input type="text" name="km" id="km" placeholder="Service km">
                <h5>Add the procedure</h5>
                <select name="service_procedure[]">
                    @foreach($service_proc as $sp)
                        <option value="{{$sp['id']}}">{{$sp['name']}} - {{$sp['status']}}</option>
                    @endforeach
                </select>
                <h5>Add a description</h5>
                <input type="text" name="description[]" placeholder="Description">
            </div>
            <button type="button" id="add-item" class="btn btn-primary">Add Item</button>
            <br>
            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>
</div>
@endsection