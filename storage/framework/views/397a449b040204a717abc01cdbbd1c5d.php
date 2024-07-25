<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employee</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/form.css', 'resources/js/app.js']); ?>
</head>
<body>
    
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="content">
        <form class="form" action="<?php echo e(route('user.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h1 class="form-title">Add Admin</h1>
            <p class="input-label">Username:</p>
            <input type="text" class="input" name="username" placeholder="Enter new username" required>
            <?php if($errors->any()): ?>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="error"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <p class="input-label">Password:</p>
            <input type="password" class="input" name="password" placeholder="Enter new password" required>
            <div class="button-container">
                <button type="submit" class="button">Add</button>
                <a href="<?php echo e(route('user.index')); ?>" class="second-button">Cancel</a>
            </div>
        </form>
    </div>
    
    <script>
        // toggle sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // success message
        document.addEventListener('DOMContentLoaded', function() {
            <?php if(session('success')): ?>
                alert('<?php echo e(session('success')); ?>');
            <?php endif; ?>
        });
    </script>
</body>
</html><?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Website\resources\views/admin/create.blade.php ENDPATH**/ ?>