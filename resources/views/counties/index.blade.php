@extends('layout')

@section('title')
<h1>Megyék</h1>
@endsection

@section('content')


<a href="{{ route('counties.create') }}">Új megye létrehozása</a>

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