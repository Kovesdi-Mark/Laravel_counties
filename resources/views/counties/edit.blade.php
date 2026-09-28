@extends('layout')

@section('title')
<h1>Megye szerkesztése</h1>
@endsection

@section('content')

@error('name')
<div>{{ $message }}</div>
@enderror

<a href="{{ route('counties.index') }}">Vissza</a>

<form action="{{ route('counties.update', $county->id) }}" method="post">
    @csrf
    @method('PUT');
    <fieldset>
        <label for="name">Megye neve</label>
        <input type="text" name="name" id="name" value="{{old('name', $county->name)}}">
    </fieldset>
    <fieldset>
        <label for="badge_url">Megye címerének URL-je</label>
        <input type="text" name="badge_url" id="badge_url" value="{{old('badge_url', $county->badge_url)}}">
    </fieldset>
    <button type="submit">Mentés</button>
</form>
@endsection