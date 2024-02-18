@extends('layouts.app')

@section('content')
{{-- to if apo kato einai kapos anoysio afoy pernaei prota apo to middleware(Auth) --}}
<div class='main-welcome'>
    <table class="table table-striped">
        <th>Brand</th><th>Model</th><th>Plate number</th>
        <tr>
            <td>
                {{$vehicles[0]->brand}}
            </td>
            <td>
                {{$vehicles[0]->model}}
            </td>
            <td>
                {{$vehicles[0]->plate_number}}
            </td>
        </tr>
    </table>
</div>
@endsection