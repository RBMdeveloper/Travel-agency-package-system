<!DOCTYPE html>
<html>
<head>
    <title>Add Destination</title>
</head>
<body>
    <h1>Add New Destination</h1>

    <?php if(session('success')): ?>
        <p style="color: green"><?php echo e(session('success')); ?></p>
    <?php endif; ?>

    <form action="<?php echo e(route('destinations.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Image:</label>
        <input type="file" name="image"><br><br>

        <button type="submit">Save</button>
    </form>
</body>
</html>
<?php /**PATH E:\laravel\Testing\practice\resources\views/destinations/create.blade.php ENDPATH**/ ?>