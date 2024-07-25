<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/form.css', 'resources/js/app.js']); ?>
</head>
<body>
    
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="content" style="padding: 3vw 0 0 0">
        <h1 class="form-title">Edit Admin</h1>
        
        <form class="form" action="<?php echo e(route('user.updateUsername', $user)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <p class="input-label">Username:</p>
            <input type="text" class="input" name="username" placeholder="Enter new username" value="<?php echo e($user->username); ?>" required>
            <?php if($errors->any() && $errors->has('username')): ?>
                <?php $__currentLoopData = $errors->get('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="error"><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <div class="button-container">
                <button type="submit" class="button">Save Username</button>
            </div>
        </form>

        
        <form class="form" action="<?php echo e(route('user.updatePassword', $user)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <p class="input-label">Previous Password:</p>
            <input type="password" class="input" name="prev_password" placeholder="Enter current password" required>
            <?php if($errors->has('prev_password')): ?>
                <p class="error"><?php echo e($errors->first('prev_password')); ?></p>
            <?php endif; ?>
            <p class="input-label">New Password:</p>
            <input type="password" class="input" name="new_password" placeholder="Enter new password" required>
            <div class="button-container">
                <button type="submit" class="button">Save Password</button>
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
</html><?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Website\resources\views/admin/edit.blade.php ENDPATH**/ ?>