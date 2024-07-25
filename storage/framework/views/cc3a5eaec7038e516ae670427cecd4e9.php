<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add salary</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/form.css', 'resources/js/app.js']); ?>
</head>
<body>
    
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="content">
        <form class="form" action="<?php echo e(route('salary.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h1 class="form-title">Add Salary</h1>
            <p class="input-label">Select employee:</p>
            <select name="employee_id" class="input">
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($employee->id); ?>">
                        <?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <p class="input-label">Amount:</p>
            <input type="number" class="input" name="amount" placeholder="Enter amount" required>
            <p class="input-label">Bonus:</p>
            <input type="number" class="input" name="bonus" placeholder="Enter bonus" required>
            <p class="input-label">Deductions:</p>
            <input type="number" class="input" name="deductions" placeholder="Enter deductions" required>
            <p class="input-label">Pay date:</p>
            <input type="date" class="input" name="pay date" placeholder="Enter pay date" required>
            <div class="button-container">
                <button type="submit" class="button">Add</button>
                <a href="<?php echo e(route('salary.index')); ?>" class="second-button">Cancel</a>
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
</html><?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Website\resources\views/salary/create.blade.php ENDPATH**/ ?>