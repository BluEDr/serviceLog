@extends('layouts.app')
@section('content')
{{-- to if apo kato einai kapos anoysio afoy pernaei prota apo to middleware(Auth) --}}
  
{{-- {{($vehicles->gas_type != null) ? $vehicles->gas_type->name : 'no gas added.'}} --}}
<h1> Manage your service here from {{$vehicles->brand}} {{$vehicles->model}}</h1>

<div class='main-welcome'>
    <div class='welcome-75-div'>
        @if(isset($junction))
            <table class="table table-striped">
                <tr>
                    <th>Vehicle</th>
                    <th>km</th>
                    <th>Service procedure</th>
                    <th>Status</th>
                    <th>Next Service</th>
                    <th>Description</th>
                </tr>
            @foreach ($junction as $j)
                <tr>
                    <td> {{$j->vehicle->brand}} {{$j->vehicle->model}} </td>
                    <td> {{$j->km_service}} </td>
                    <td> {{$j->service_procedure->name}}</td>
                    <td> {{$j->service_procedure->status}}</td>
                    <td> {{$j->km_for_next_service}}</td>
                    <td> {{$j->more_details}}</td>
                </tr>
            @endforeach
            </table>

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
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="popover" data-bs-content="On this page, you can log your vehicle's service details to keep a record of all maintenance activities. This service helps you avoid forgetting any repairs or changes made in the past. Here, you can add completed services and set reminders for future ones. You need to enter the kilometers at which the service was performed. After that, select the procedure and it's recommended to add a description for each procedure. To add another procedure at the same mileage, press the 'Add a new procedure' button.">
            How it works?
        </button> <br><br>
        <h4><strong>Add a new service here:</strong></h4>
        <form method="post" action="">
            @csrf
            <script>
                    document.addEventListener('DOMContentLoaded', function() { 
                    // Embedding the PHP array into a JavaScript variable
                    const serviceProcOptionsElement = @json($service_proc);
                    const addItemButton = document.getElementById('add-item');
                    const itemsContainer = document.getElementById('items');
                    const serviceProcOptions = {!! json_encode($service_proc) !!};

                    addItemButton.addEventListener('click', function() {
                        const newItem = document.createElement('div');
                        newItem.classList.add('item');
                        newItem.innerHTML = `
                            <h5>Add the procedure</h5>
                            <select name="service_procedure[]">
                                ${serviceProcOptions.map(sp => `<option value="${sp.id}">${sp.name} - ${sp.status}</option>`).join('')}
                            </select>
                            <h5>Add a description</h5>
                            <input type="text" name="description[]" placeholder="Description">
                            <button type="button" class="remove-item btn btn-secondary">Remove</button>
                        `;
                        itemsContainer.appendChild(newItem);
                    });

                    itemsContainer.addEventListener('click', function(event) {
                        if (event.target.classList.contains('remove-item')) {
                            event.target.closest('.item').remove();
                        }
                    });
                });
            </script>
            
            <div id="items">
                <h5>Km<span style="color: red">*</span></h5>
                <input type="text" name="km" id="km" placeholder="Service km">
                <h5>Km for the next service</h5>
                <select name="kmNextService" id="kmNextService">
                    <option value="-" selected>-</option>
                    <option value="500">500</option>
                    <option value="1000">1,000</option>
                    <option value="2000">2,000</option>
                    <option value="3000">3,000</option>
                    <option value="5000">5,000</option>
                    <option value="7500">7,500</option>
                    <option value="10000">10,000</option>
                    <option value="15000">15,000</option>
                    <option value="20000">20,000</option>
                    <option value="25000">25,000</option>
                    <option value="30000">30,000</option>
                    <option value="35000">35,000</option>
                    <option value="40000">40,000</option>
                    <option value="45000">45,000</option>
                    <option value="50000">50,000</option>
                    <option value="55000">55,000</option>
                    <option value="60000">60,000</option>
                    <option value="65000">65,000</option>
                    <option value="70000">70,000</option>
                    <option value="75000">75,000</option>
                    <option value="80000">80,000</option>
                    <option value="85000">85,000</option>
                    <option value="90000">90,000</option>
                    <option value="95000">95,000</option>
                    <option value="100000">100,000</option>
                </select>                
                <h5>Months for the next service</h5>
                <select name="monthsNextService" id="monthsNextService">
                    <option value="-">-</option>
                    <option value="3">3 months</option>
                    <option value="6">6 months</option>
                    <option value="9">9 months</option>
                    <option value="12" selected>12 months (1 year)</option>
                    <option value="15">15 months</option>
                    <option value="18">18 months</option>
                    <option value="21">21 months</option>
                    <option value="24">24 months (2 years)</option>
                    <option value="27">27 months</option>
                    <option value="30">30 months</option>
                    <option value="33">33 months</option>
                    <option value="36">36 months (3 years)</option>

                </select>                
                <h5>Add the procedure</h5>
                <select name="service_procedure[]">
                    @foreach($service_proc as $sp)
                        <option value="{{$sp['id']}}">{{$sp['name']}} - {{$sp['status']}}</option>
                    @endforeach
                </select>
                <h5>Add a description</h5>
                <input type="text" name="description[]" placeholder="Description">
            </div>
            
            <input class="btn btn-primary" type="submit" value="Submit" style="margin-top: 5px">
            <button type="button" id="add-item" class="btn btn-outline-danger" style="margin-top: 5px">Add a new procedure</button>
            
        </form>
    </div>
</div>
@endsection