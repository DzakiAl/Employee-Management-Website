<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/index.css', 'resources/js/app.js']); ?>
</head>
<body>
    
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="content">
        <div class="button-container">
            <a href="<?php echo e(route('user.create')); ?>" class="button">Add Admin</a>
        </div>
        <div class="table-container">
            <table class="table" border="10">
                <thead>
                    <tr>
                        <th class="table-header">Num</th>
                        <th class="table-header">Username</th>
                        <th class="table-header">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="table-body"><?php echo e($loop->iteration); ?></td>
                            <td class="table-body"><?php echo e($user->username); ?></td>
                            <td class="table-body">
                                <a href="<?php echo e(route('user.edit', $user)); ?>" class="action-button">Edit</a>
                                <?php if(auth()->id() === $user->id): ?>
                                    <form action="<?php echo e(route('user.destroy', $user)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="action-button" onclick="return confirm('Are you sure you want to delete your account?')">Delete</button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
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
</html><?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Website\resources\views/admin/index.blade.php ENDPATH**/ ?>