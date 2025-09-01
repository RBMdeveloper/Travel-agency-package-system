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
    <h2>Itineraries for {{ $package->name }}</h2>
    <a href="{{ route('itineraries.create', $package->id) }}" class="btn btn-success mb-3">+ Add Itinerary</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Day</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($itineraries as $itinerary)
                <tr>
                    <td>{{ $itinerary->day }}</td>
                    <td>{{ $itinerary->title }}</td>
                    <td>{{ $itinerary->description }}</td>
                    <td>
                        <a href="{{ route('itineraries.edit', $itinerary->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('itineraries.destroy', $itinerary->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No itineraries found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>