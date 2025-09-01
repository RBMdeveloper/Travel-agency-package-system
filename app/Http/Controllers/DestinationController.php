<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{

    public function index()
    {
        $destinations = Destination::withCount('packages')->get();
    return view('welcome', compact('destinations'));
    }


    public function create()
    {
        return view('destinations.create');
    }

    // Store new destination
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
        }

        Destination::create([
            'name'  => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Destination added successfully!');
    }

    
    

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $destination->image;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('destinations', 'public');
        }

        $destination->update([
            'name'  => $request->name,
            'image' => $path,
        ]);

        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully');
    }


    public function destroy($id)
    {
        $destination = Destination::withCount('packages')->findOrFail($id);


        if ($destination->packages_count > 0) {
            return redirect()->route('destinations.index')->with('error', 'Cannot delete destination with packages');
        }

        $destination->delete();

        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully');
    }
}
