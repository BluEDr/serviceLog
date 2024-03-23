@extends('layouts.app')

@section('content')
    <h1> Hello to add service {{($vehicles->gas_type != null) ? $vehicles->gas_type->name : 'no gas added.'}} </h1>
@endsection