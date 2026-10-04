<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = City::query();

        if ($request->filled('county')){
            $query->where('id_county', '=', $request->county);
        }
        if ($request->filled('search')){
            $query->where('name', 'LIKE', '%'.$request->search.'%');
        }

        $cities = $query->paginate(20)->withQueryString();

        $counties = County::all();


        return view('cities.index', compact('cities', 'counties'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $counties = County::all();

        return view('cities.create', compact('counties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|string",
            "population" => "required|int",
        ]);

        $city = new City();
        $city->zip_code = $request->zip_code;
        $city->name = $request->name;
        $city->population = $request->population;
        $city->id_county = $request->id_county;
        $city->save();

        return redirect()->route('cities.index')->with('success', "{$city->name} sikeresen hozzáadva.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city = City::find($id);

        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::find($id);
        $counties = County::all();

        return view('cities.edit', compact('city', 'counties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|min:3|string",
            "population" => "required|int",
        ]);

        $city = City::find($id);
        $city->zip_code = $request->zip_code;
        $city->name = $request->name;
        $city->population = $request->population;
        $city->id_county = $request->id_county;
        $city->save();

        return redirect()->route('cities.index')->with('success', "$request->name sikeresen szerkesztve");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::find($id);
        $city->delete();

        return redirect()->route('cities.index')->with('success', "$city->name sikeresen törölve.");
    }
}
