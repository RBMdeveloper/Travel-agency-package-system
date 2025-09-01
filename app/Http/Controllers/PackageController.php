<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\destination;
use App\Models\package;

class PackageController extends Controller
{
     public function create($destinationId)
    {
        $destination = Destination::findOrFail($destinationId);
        return view('packages.create', compact('destination'));
    }

public function store(Request $request, Destination $destination)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'price'  => 'nullable|numeric',
        'description' => 'nullable|string',
        'days_nights_detail' => 'required|string|max:50',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // handle image upload (if any)
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('packages', 'public');
    }

    $validated['destination_id'] = $destination->id;

    Package::create($validated);

    return redirect()->route('packages.index', $destination->id)
                     ->with('success', 'Package created successfully!');
}



    public function index($destinationId)
{
    $destination = Destination::findOrFail($destinationId);
    $packages = $destination->packages()->withCount('itineraries')->get();

    return view('packages.index', compact('destination', 'packages'));
}


    
}
