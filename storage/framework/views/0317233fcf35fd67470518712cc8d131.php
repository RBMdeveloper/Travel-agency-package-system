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
    <h2>Add Itinerary for <?php echo e($package->name); ?></h2>

    <form action="<?php echo e(route('itineraries.store', $package->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <label>Day</label>
            <input type="number" name="day" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Itinerary</button>
    </form>
</div>
</body>
</html><?php /**PATH E:\laravel\Testing\practice\resources\views/itineraries/create.blade.php ENDPATH**/ ?>