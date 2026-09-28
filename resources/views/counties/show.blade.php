@extends('layout')

@section('title')
<h1>{{ $county->name }}</h1>
@endsection

@section('content')
<a href="{{ route('counties.index') }}">Vissza</a>

<ul>
    <li>Id: {{ $county->id }}</li>
    <li>Name: {{ $county->name }}</li>
    <li>Badge_url: {{ $county->badge_url }}</li>
</ul>

@endsection