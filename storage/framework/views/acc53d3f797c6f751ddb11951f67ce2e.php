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
    <h2>Itineraries for <?php echo e($package->name); ?></h2>
    <a href="<?php echo e(route('itineraries.create', $package->id)); ?>" class="btn btn-success mb-3">+ Add Itinerary</a>

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
            <?php $__empty_1 = true; $__currentLoopData = $itineraries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itinerary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($itinerary->day); ?></td>
                    <td><?php echo e($itinerary->title); ?></td>
                    <td><?php echo e($itinerary->description); ?></td>
                    <td>
                        <a href="<?php echo e(route('itineraries.edit', $itinerary->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(route('itineraries.destroy', $itinerary->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4">No itineraries found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html><?php /**PATH E:\laravel\Testing\practice\resources\views/itineraries/index.blade.php ENDPATH**/ ?>