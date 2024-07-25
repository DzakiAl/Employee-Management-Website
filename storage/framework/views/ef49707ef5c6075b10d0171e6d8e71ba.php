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
        <form class="form" action="<?php echo e(route('employee.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <h1 class="form-title">Add Employee</h1>
            <p class="input-label">Upload photo:</p>
            <input type="file" class="input-file" name="photo" required>
            <p class="input-label">First name:</p>
            <input type="text" class="input" name="first_name" placeholder="Enter first name" required>
            <p class="input-label">Last name:</p>
            <input type="text" class="input" name="last_name" placeholder="Enter last name" required>
            <p class="input-label">Date of birth:</p>
            <input type="date" class="input" name="date_of_birth" required>
            <p class="input-label">Gender:</p>
            <input type="text" class="input" name="gender" placeholder="Enter gender" required>
            <p class="input-label">Email:</p>
            <input type="email" class="input" name="email" placeholder="Enter email" required>
            <p class="input-label">Phone number:</p>
            <input type="number" class="input" name="phone" placeholder="Enter phone number" required>
            <p class="input-label">Address:</p>
            <input type="text" class="input" name="address" placeholder="Enter address" required>
            <p class="input-label">Date hired:</p>
            <input type="date" class="input" name="date_hired" required>
            <p class="input-label">Position:</p>
            <select name="position" class="input">
                <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($position->id); ?>"><?php echo e($position->position_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <p class="input-label">Department:</p>
            <select name="department" class="input">
                <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($department->id); ?>"><?php echo e($department->department_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <p class="input-label">Status:</p>
            <select name="status" class="input">
                <option value="Active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <div class="button-container">
                <button type="submit" class="button">Add</button>
                <a href="<?php echo e(route('employee.index')); ?>" class="second-button">Cancel</a>
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
</html><?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Web\resources\views/employee/create.blade.php ENDPATH**/ ?>