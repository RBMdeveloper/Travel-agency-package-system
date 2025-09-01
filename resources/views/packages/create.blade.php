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
    <h2>Create Package for {{ $destination->name }}</h2>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach($errors->all() as $err) <li>{{ $err }}</li> @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('packages.store', $destination->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Package Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="price">Package Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label for="days_nights_detail">Days / Nights (e.g. 5D/4N)</label>
            <input type="text" name="days_nights_detail" id="days_nights_detail" class="form-control" value="{{ old('days_nights_detail') }}" required>
        </div>

        <div class="form-group">
            <label for="image">Package Image</label>
            <input type="file" name="image" id="image" accept="image/*" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Package Description</label>
            <textarea name="description" id="description" rows="5" class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Save Package</button>
        <a href="{{ route('packages.index', $destination->id) }}" class="btn btn-secondary">Back to Packages</a>
    </form>
</div>
</body>
</html>
