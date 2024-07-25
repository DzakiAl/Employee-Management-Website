<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Attendance</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/form.css', 'resources/js/app.js']); ?>
</head>
<body>
    
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="content">
        <form class="form" action="<?php echo e(route('attendance.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h1 class="form-title">Add Attendance</h1>
            <p class="input-label">Select Employee:</p>
            <select name="employee_id" class="input">
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($employee->id); ?>">
                        <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <p class="input-label">Select date:</p>
            <input type="date" class="input" name="date" required>
            <p class="input-label">Check in:</p>
            <input type="time" class="input" name="check_in_time">
            <p class="input-label">Check out:</p>
            <input type="time" class="input" name="check_out_time">
            <p class="input-label">Select Status</p>
            <select name="status" class="input">
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
                <option value="Sick">Sick</option>
                <option value="Excused Absent">Excused Absent</option>
                <option value="Leave">Leave</option>
            </select>
            <div class="button-container">
                <button type="submit" class="button">Add</button>
                <a href="<?php echo e(route('attendance.index')); ?>" class="second-button">Cancel</a>
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
</html><?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Website\resources\views/attendance/create.blade.php ENDPATH**/ ?>