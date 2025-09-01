<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2>Packages for {{ $destination->name }}</h2>
    <a href="{{ route('packages.create', $destination->id) }}" class="btn btn-success mb-3">+ Add New Package</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Days/Nights</th>
                <th>Itineraries</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($packages as $package)
            <tr>
                <td>{{ $package->id }}</td>
                <td>
                    @if($package->image)
                        <img src="{{ asset('storage/'.$package->image) }}" alt="{{ $package->name }}" width="80">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $package->name }}</td>
                <td>{{ $package->price }}</td>
                <td>{{ Str::limit($package->description, 100) }}</td>
                <td>{{ $package->days }} Days / {{ $package->nights }} Nights</td>
                <td>{{ $package->itineraries_count }}</td>
                <td>
                    <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                    <a href="{{ route('itineraries.create', $package->id) }}" class="btn btn-success btn-sm">+ Add Itinerary</a>
                    <a href="{{ route('itineraries.index', $package->id) }}" class="btn btn-info btn-sm">View Itineraries</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">No packages found for this destination.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>


</body>
</html>