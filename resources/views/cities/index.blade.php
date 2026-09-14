@extends('layout')

@section('content')

<h1>Városok</h1>
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
        </tr>
    @endforeach
</table>

@endsection