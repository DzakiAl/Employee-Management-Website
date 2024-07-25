<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/index.css', 'resources/js/app.js']); ?>
</head>
<body>
    
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="content">
        <div class="button-container">
            <a href="<?php echo e(route('attendance.create')); ?>" class="button">Add Attendance</a>
            <a href="" class="button">Print</a>
        </div>
        <div class="table-container">
            <table class="table" border="10">
                <thead>
                    <tr>
                        <th class="table-header">Num</th>
                        <th class="table-header">Name</th>
                        <th class="table-header">Date</th>
                        <th class="table-header">Check in time</th>
                        <th class="table-header">Check out time</th>
                        <th class="table-header">Status</th>
                        <th class="table-header">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="table-body"><?php echo e($loop->iteration); ?></td>
                            <td class="table-body"><?php echo e($attendance->employee->first_name); ?> <?php echo e($attendance->employee->last_name); ?></td>
                            <td class="table-body"><?php echo e($attendance->date); ?></td>
                            <td class="table-body"><?php echo e($attendance->check_in_time); ?></td>
                            <td class="table-body"><?php echo e($attendance->check_out_time); ?></td>
                            <td class="table-body"><?php echo e($attendance->status); ?></td>
                            <td class="table-body">
                                <a href="<?php echo e(route('attendance.edit', $attendance)); ?>" class="action-button">Edit</a>
                                <form action="<?php echo e(route('attendance.destroy', $attendance)); ?>" method="POST" style="margin: 0; padding: 0;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="action-button"
                                        onclick="return confirm('Are you sure you want to delete this attendance?')">Delete</button>
                                </form>
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
</html><?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Web\resources\views/attendance/index.blade.php ENDPATH**/ ?>