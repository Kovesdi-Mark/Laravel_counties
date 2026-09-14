@extends('layout')

@section('content')

<h1>Counties Index</h1>

<a href="{{ route('counties.create') }}">Új megye</a>

@if (session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <tr>
        <th>#</th>
        <th>Név</th>
        <th>Url</th>
    </tr>
    @foreach ($counties as $county)
        <tr>
            <td>{{ $county->id }}</td>
            <td>{{ $county->name}}</td>
            <td><a href="{{ $county->badge_url}}"><img src="{{ $county->badge_url}}" alt="{{ $county->name }}" width="20px"></img></a></td>
            <td><a href="{{ route('counties.show', $county->id)}}">Megjelenítés</a></td>
            <td><a href="{{ route('counties.edit', $county->id)}}">Szerkesztés</a></td>
            <td>
                <form action="{{ route('counties.destroy', $county->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Törlés</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection