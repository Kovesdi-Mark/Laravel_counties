@extends('layout')

@section('title')
<h1>{{ $city->name}} szerkesztése</h1>
@endsection

@section('content')

<a href="{{ route('cities.index') }}">Vissza</a>

<form action="{{ route('cities.update', $city->id)}}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="zip_code">Irányítószám</label>
        <input type="text" name="zip_code" id="zip_code" value="{{ $city->zip_code }}">
    </fieldset>
    <fieldset>
        <label for="name">Név</label>
        <input type="text" name="name" id="name" value="{{ $city->name }}">
    </fieldset>
    <fieldset>
        <label for="id_county">Megye</label>
        <select name="id_county" id="id_county" selected="{{ $city->county->name }}">
            @foreach ($counties as $county)
                    <option value="{{ $county->id }}" {{$city->id_county == $county->id ? "selected" : ""}}>{{ $county->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="population">Népesség</label>
        <input type="text" name="population" id="population" value="{{ $city->population }}">
    </fieldset>
    <button type="submit">Szerkesztés</button>
</form>
@endsection