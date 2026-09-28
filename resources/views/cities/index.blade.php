@extends('layout')

@section('title')
<h1>Városok</h1>
@endsection

@section('content')


@if(session('success'))
<div>
    {{ session('success') }}
</div>
@endif

<a href="{{ route('cities.create') }}">Új város létrehozása</a>

<form action="{{ route('cities.index') }}" method="GET">
    <input type="text" name="search" id="search" value="{{ request('search') }}">
    <select name="county" id="county">
        <option>|||</option>
        @foreach($counties as $county)
            <option value="{{ $county->id }}" {{$county->id == request('county') ? "selected" : ""}}>{{ $county->name }}</option>
        @endforeach
    </select>
    <button type="submit">Keresés</button>
</form>

<table>
    <tr>
        <th>#</th>
        <th>zip_code</th>
        <th>name</th>
        <th>population</th>
        <th>county</th>
        <th colspan="3">Műveletek</th>
    </tr>
    @foreach ($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->zip_code }}</td>
            <td>{{ $city->name }}</td>
            <td>{{ $city->population }}</td>
            <td>{{ $city->county?->name }}</td>
            <td><a href="{{ route('cities.show', $city->id) }}">Megjelenítés</a></td>
            <td><a href="{{ route('cities.edit', $city->id) }}">Szerkesztés</a></td>
            <td>
                <form action="{{ route('cities.destroy', $city->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Törlés</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<div class="paginator">
    {{ $cities->links() }}
</div>

@endsection