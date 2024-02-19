@extends('layouts.app')

@section('content')
{{-- to if apo kato einai kapos anoysio afoy pernaei prota apo to middleware(Auth) --}}
<div class='main-welcome'>
    <table class="table table-striped">
        <th>Brand</th><th>Model</th><th>Plate number</th>
        <tr>
            <td>
                {{$vehicles->brand}}
            </td>
            <td>
                {{$vehicles->model}}
            </td>
            <td>
                {{$vehicles->plate_number}}
            </td>
            <td>
                {{$vehicles->vehicle_type}}
            </td>
            <td>
                {{$vehicles->registration_year}}
            </td>
            <td>
                {{$vehicles->plate_number}}
            </td>
            <td>
                {{($vehicles->gas_type != null) ? $vehicles->gas_type->name : '-'}}
            </td>
        </tr>
    </table>
</div>
@endsection