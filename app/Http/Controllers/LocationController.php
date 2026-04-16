<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of all locations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loc = Location::paginate(20);
        return view('loc.list')->with(['loc' => $loc]);
    }

    /**
     * Show the form for creating a new location.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loc.index');
    }

    /**
     * Store a newly created location in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'locName' => 'required|string|max:255|unique:locations,name',
        ]);

        $loc = new Location();
        $loc->name = strtoupper($request->locName);
        $loc->save();

        return redirect('loc')->with('status', 'Location ' . $loc->name . ' created successfully');
    }

    /**
     * Display the specified location.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('loc.show')->with('location', $location);
    }

    /**
     * Show the form for editing the specified location.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $loc = Location::findOrFail($request->id);
        return view('loc.edit')->with(['loc' => $loc]);
    }

    /**
     * Update the specified location in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'locName' => 'required|string|max:255|unique:locations,name,' . $request->id,
        ]);

        $loc = Location::findOrFail($request->id);
        $loc->name = strtoupper($request->locName);
        $loc->save();

        return redirect('loc')->with('status', $loc->name . ' updated successfully');
    }

    /**
     * Remove the specified location from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $loc = Location::findOrFail($request->id);
        $locName = $loc->name;
        $loc->delete();

        return redirect('loc')->with('status', 'Location ' . $locName . ' deleted successfully');
    }
}
