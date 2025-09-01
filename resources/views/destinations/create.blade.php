<!DOCTYPE html>
<html>
<head>
    <title>Add Destination</title>
</head>
<body>
    <h1>Add New Destination</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Image:</label>
        <input type="file" name="image"><br><br>

        <button type="submit">Save</button>
    </form>
</body>
</html>
