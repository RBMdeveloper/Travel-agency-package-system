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
    <h2>Destinations</h2>

    <a href="{{ route('destinations.create') }}" class="btn btn-primary mb-3">+ Add Destination</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Packages Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($destinations as $destination)
            <tr>
                <td>{{ $destination->id }}</td>
                <td>
                    @if($destination->image)
                        <img src="{{ asset('storage/'.$destination->image) }}" alt="{{ $destination->name }}" width="80">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $destination->name }}</td>
                <td>{{ $destination->packages_count }}</td>
                <td>
                    <a href="{{ route('packages.create', $destination->id) }}" class="btn btn-success btn-sm">+ Create Package</a>
                    <a href="{{ route('packages.index', $destination->id) }}" class="btn btn-info btn-sm">View Packages</a>
                    <a href="{{ route('destinations.edit', $destination->id) }}" class="btn btn-warning btn-sm">Edit</a>


                    @if($destination->packages_count == 0)
                        <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @else
                        <button class="btn btn-secondary btn-sm" disabled>Delete</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>