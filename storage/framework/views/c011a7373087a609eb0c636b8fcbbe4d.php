<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Position</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/form.css', 'resources/js/app.js']); ?>
</head>
<body>
    
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="content">
        <form class="form" action="<?php echo e(route('position.update', $position)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <h1 class="form-title">Edit Position</h1>
            <p class="input-label">Position name:</p>
            <input type="text" name="position_name" class="input" placeholder="Enter position name" value="<?php echo e($position->position_name); ?>" required>
            <p class="input-label">Salary range:</p>
            <input type="text" name="salary_range" class="input" placeholder="Enter salary range" value="<?php echo e($position->salary_range); ?>" required>
            <div class="button-container">
                <button type="submit" class="button">Save</button>
                <a href="<?php echo e(route('position.index')); ?>" class="second-button">Cancel</a>
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
</html>
<?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Web\resources\views/position/edit.blade.php ENDPATH**/ ?>