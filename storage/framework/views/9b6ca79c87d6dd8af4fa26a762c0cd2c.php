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

    <a href="<?php echo e(route('destinations.create')); ?>" class="btn btn-primary mb-3">+ Add Destination</a>

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
            <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($destination->id); ?></td>
                <td>
                    <?php if($destination->image): ?>
                        <img src="<?php echo e(asset('storage/'.$destination->image)); ?>" alt="<?php echo e($destination->name); ?>" width="80">
                    <?php else: ?>
                        <span>No Image</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($destination->name); ?></td>
                <td><?php echo e($destination->packages_count); ?></td>
                <td>
                    <a href="<?php echo e(route('packages.create', $destination->id)); ?>" class="btn btn-success btn-sm">+ Create Package</a>
                    <a href="<?php echo e(route('packages.index', $destination->id)); ?>" class="btn btn-info btn-sm">View Packages</a>
                    <a href="<?php echo e(route('destinations.edit', $destination->id)); ?>" class="btn btn-warning btn-sm">Edit</a>


                    <?php if($destination->packages_count == 0): ?>
                        <form action="<?php echo e(route('destinations.destroy', $destination->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    <?php else: ?>
                        <button class="btn btn-secondary btn-sm" disabled>Delete</button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

</body>
</html><?php /**PATH E:\laravel\Testing\practice\resources\views/welcome.blade.php ENDPATH**/ ?>