@extends('layout')

@section('title')
<h1>Új város létrehozása</h1>
@endsection

@section('content')

@error('name')
<div>{{ $message }}</div>
@enderror

<a href="{{ route('cities.index')}}">Vissza</a>

<form action="{{ route('cities.store')}}" method="POST">
    @csrf
    <fieldset>
        <label for="zip_code">Irányítószám</label>
        <input type="text" name="zip_code" id="zip_code">
    </fieldset>
    <fieldset>
        <label for="name">Név</label>
        <input type="text" name="name" id="name">
    </fieldset>
    <fieldset>
        <label for="id_county">Megye</label>
        <select name="id_county" id="id_county">
            @foreach ($counties as $county)
                <option value="{{ $county->id }}">{{ $county->name }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="population">Népesség</label>
        <input type="text" name="population" id="population">
    </fieldset>
    <button type="submit">Mentés</button>
</form>
@endsection