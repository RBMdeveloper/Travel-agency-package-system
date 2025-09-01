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
    <h2>Packages for <?php echo e($destination->name); ?></h2>
    <a href="<?php echo e(route('packages.create', $destination->id)); ?>" class="btn btn-success mb-3">+ Add New Package</a>

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
        <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($package->id); ?></td>
                <td>
                    <?php if($package->image): ?>
                        <img src="<?php echo e(asset('storage/'.$package->image)); ?>" alt="<?php echo e($package->name); ?>" width="80">
                    <?php else: ?>
                        <span>No Image</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($package->name); ?></td>
                <td><?php echo e($package->price); ?></td>
                <td><?php echo e(Str::limit($package->description, 100)); ?></td>
                <td><?php echo e($package->days); ?> Days / <?php echo e($package->nights); ?> Nights</td>
                <td><?php echo e($package->itineraries_count); ?></td>
                <td>
                    <a href="<?php echo e(route('packages.edit', $package->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="<?php echo e(route('packages.destroy', $package->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                    <a href="<?php echo e(route('itineraries.create', $package->id)); ?>" class="btn btn-success btn-sm">+ Add Itinerary</a>
                    <a href="<?php echo e(route('itineraries.index', $package->id)); ?>" class="btn btn-info btn-sm">View Itineraries</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="8" class="text-center">No packages found for this destination.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>


</body>
</html><?php /**PATH E:\laravel\Testing\practice\resources\views/packages/index.blade.php ENDPATH**/ ?>