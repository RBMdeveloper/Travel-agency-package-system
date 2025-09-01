<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    hello here is student <?php echo e($student->first_name); ?> Detail pageprofile,

    <hr>

    <p>Full Name :- <?php echo e($student->first_name); ?>  <?php echo e($student->last_name); ?></p>
    <p>Email :- <?php echo e($student->email); ?></p>
    <p>Phone :- <?php echo e($student->phone); ?></p>
    <p>Gender:- <?php echo e($student->gender); ?></p>
    <p>credits :- <?php echo e($student->credits); ?></p>
    <p>My skills : -
        <?php $__currentLoopData = $student->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($skill); ?>

            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </p>
</body>
</html><?php /**PATH E:\laravel\Testing\practice\resources\views/student.blade.php ENDPATH**/ ?>