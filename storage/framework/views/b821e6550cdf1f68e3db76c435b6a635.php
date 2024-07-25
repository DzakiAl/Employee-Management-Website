<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/index.css', 'resources/js/app.js']); ?>
</head>
<body>
    
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="content">
        <div class="button-container">
            <a href="<?php echo e(route('employee.create')); ?>" class="button">Add Employee</a>
            <a href="#" onclick="window.print()" class="button">Print</a>
        </div>
        <div class="table-container">
            <table class="table" border="10">
                <thead>
                    <tr>
                        <th class="table-header">Num</th>
                        <th class="table-header photo-column">Photo</th>
                        <th class="table-header">First Name</th>
                        <th class="table-header">Last Name</th>
                        <th class="table-header">Date of birth</th>
                        <th class="table-header">Gender</th>
                        <th class="table-header">Email</th>
                        <th class="table-header">Phone</th>
                        <th class="table-header">Address</th>
                        <th class="table-header">Date hired</th>
                        <th class="table-header">Position</th>
                        <th class="table-header">Department</th>
                        <th class="table-header">Status</th>
                        <th class="table-header action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="table-body"><?php echo e($loop->iteration); ?></td>
                            <td class="table-body photo-column">
                                <img src="<?php echo e(asset('photo/' . $employee->photo)); ?>" alt="photo of employee"
                                    class="photo">
                            </td>
                            <td class="table-body"><?php echo e($employee->first_name); ?></td>
                            <td class="table-body"><?php echo e($employee->last_name); ?></td>
                            <td class="table-body"><?php echo e($employee->date_of_birth); ?></td>
                            <td class="table-body"><?php echo e($employee->gender); ?></td>
                            <td class="table-body"><?php echo e($employee->email); ?></td>
                            <td class="table-body"><?php echo e($employee->phone); ?></td>
                            <td class="table-body"><?php echo e($employee->address); ?></td>
                            <td class="table-body"><?php echo e($employee->date_hired); ?></td>
                            <td class="table-body"><?php echo e($employee->position->position_name); ?></td>
                            <td class="table-body"><?php echo e($employee->department->department_name); ?></td>
                            <td class="table-body"><?php echo e($employee->status); ?></td>
                            <td class="table-body action-column">
                                <a href="<?php echo e(route('employee.edit', $employee)); ?>" class="action-button">Edit</a>
                                <form action="<?php echo e(route('employee.destroy', $employee)); ?>" method="POST" style="margin: 0; padding: 0;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="action-button" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
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
</html>
<?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Website\resources\views/employee/index.blade.php ENDPATH**/ ?>