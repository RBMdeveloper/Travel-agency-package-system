<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\itinarie;
use App\Models\package;

class ItineraryController extends Controller
{

    public function index($packageId)
    {
        $package = Package::findOrFail($packageId);
        $itineraries = itinarie::where('package_id', $packageId)->get();

        return view('itineraries.index', compact('package', 'itineraries'));
    }

    public function create($packageId)
    {
        $package = Package::findOrFail($packageId);
        return view('itineraries.create', compact('package'));
    }

    public function store(Request $request, $packageId)
    {
        $request->validate([
            'day' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        itinarie::create([
            'package_id' => $packageId,
            'day_number' => $request->day,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('itineraries.index', $packageId)->with('success', 'Itinerary created successfully.');
    }


    public function edit($id)
    {
        $itinerary = itinarie::findOrFail($id);
        return view('itineraries.edit', compact('itinerary'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $itinerary = itinarie::findOrFail($id);
        $itinerary->update($request->all());

        return redirect()->route('itineraries.index', $itinerary->package_id)->with('success', 'Itinerary updated successfully.');
    }

 
    public function destroy($id)
    {
        $itinerary = itinarie::findOrFail($id);
        $packageId = $itinerary->package_id;
        $itinerary->delete();

        return redirect()->route('itineraries.index', $packageId)->with('success', 'Itinerary deleted successfully.');
    }
}
