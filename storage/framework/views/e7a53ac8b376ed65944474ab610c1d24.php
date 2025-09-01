<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo e(route('updatingstudent', $stu->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input type="text" name="name" value="<?php echo e($stu->name); ?>">
        <input type="email" name="email" value="<?php echo e($stu->email); ?>">
        <button type="submit">Submit</button>
    </form>
    
</body>
</html><?php /**PATH E:\laravel\Testing\practice\resources\views/updatestudent.blade.php ENDPATH**/ ?>