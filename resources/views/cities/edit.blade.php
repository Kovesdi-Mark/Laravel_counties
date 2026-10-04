@extends('layout')

@section('title')
<h1>{{ $city->name}} szerkesztése</h1>
@endsection

@section('content')

@error('name')
<div>{{ $message }}</div>
@enderror

<a href="{{ route('cities.index') }}">Vissza</a>

<form action="{{ route('cities.update', $city->id)}}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="zip_code">Irányítószám</label>
        <input type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', $city->zip_code) }}">
    </fieldset>
    <fieldset>
        <label for="name">Név</label>
        <input type="text" name="name" id="name" value="{{ old('name', $city->name) }}">
    </fieldset>
    <fieldset>
        <label for="id_county">Megye</label>
        <select name="id_county" id="id_county">
            @foreach ($counties as $county)
                    <option value="{{ $county->id }}" {{ old('id_county', $city->id_county) == $county->id ? 'selected' : '' }}>{{ $county->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="population">Népesség</label>
        <input type="text" name="population" id="population" value="{{ old('population', $city->population) }}">
    </fieldset>
    <button type="submit">Szerkesztés</button>
</form>
@endsection