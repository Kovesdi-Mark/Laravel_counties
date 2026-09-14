@extends('layout')

@section('content')
<a href="{{ route('counties.index') }}">Vissza</a>

<h1>{{ $county->name }}</h1>

<ul>
    <li>Id: {{ $county->id }}</li>
    <li>Name: {{ $county->name }}</li>
    <li>Badge_url: {{ $county->badge_url }}</li>
</ul>

@endsection