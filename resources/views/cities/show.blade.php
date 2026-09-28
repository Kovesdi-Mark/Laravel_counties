@extends('layout')

@section('title')
<h1>{{ $city->name }}</h1>
@endsection

@section('content')

<a href="{{ route('cities.index') }}"></a>

<ul>
    <li>Id: {{ $city->id}}</li>
    <li>Irányítószám: {{ $city->zip_code }}</li>
    <li>Név: {{ $city->name}}</li>
    <li>Népesség: {{ $city->population }}</li>
    <li>Megye: {{ $city->county->name }}</li>
</ul>
@endsection