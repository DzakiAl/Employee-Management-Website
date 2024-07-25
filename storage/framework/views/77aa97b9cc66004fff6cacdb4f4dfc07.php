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
            <a href="#" onclick="window.print()" class="button">Print</a>
        </div>
        <div class="filter-container">
            <form action="<?php echo e(route('attendance.index')); ?>" method="GET">
                <label for="filter_date" class="label_date">Filter by Date:</label>
                <input type="date" id="filter_date" class="input_date" name="filter_date"
                    value="<?php echo e(request('filter_date')); ?>">
                <button type="submit" class="button_submit">Filter</button>
            </form>
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
                        <th class="table-header action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="table-body"><?php echo e($loop->iteration); ?></td>
                            <td class="table-body"><?php echo e($attendance->employee->first_name); ?>

                                <?php echo e($attendance->employee->last_name); ?></td>
                            <td class="table-body"><?php echo e($attendance->date); ?></td>
                            <td class="table-body"><?php echo e($attendance->check_in_time); ?></td>
                            <td class="table-body"><?php echo e($attendance->check_out_time); ?></td>
                            <td class="table-body"><?php echo e($attendance->status); ?></td>
                            <td class="table-body action-column">
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
        // Set the default date to today's date if no date is selected
        document.addEventListener('DOMContentLoaded', function() {
            const filterDateInput = document.getElementById('filter_date');
            if (!filterDateInput.value) {
                const today = new Date().toISOString().split('T')[0];
                filterDateInput.value = today;
            }

            // Display success message
            <?php if(session('success')): ?>
                alert('<?php echo e(session('success')); ?>');
            <?php endif; ?>
        });

        // Toggle sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html><?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Website\resources\views/attendance/index.blade.php ENDPATH**/ ?>