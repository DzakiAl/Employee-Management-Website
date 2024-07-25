<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Management Website</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>
    
    <?php echo $__env->make('layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="content">
        
        <?php if(auth()->guard()->check()): ?>
            <p class="welcome-title">Welcome back, <?php echo e(Auth::user()->username); ?></p>
        <?php else: ?>
            <p>You are not logged in.</p>
        <?php endif; ?>
        
        <div class="card-container">
            <a href="<?php echo e(route('employee.index')); ?>" class="card-link">
                <div class="card">
                    <img src="<?php echo e(asset('asset/employee-icon.svg')); ?>" alt="" class="image-card">
                    <h1 class="card-name">Employees</h1>
                </div>
            </a>
            <a href="<?php echo e(route('department.index')); ?>" class="card-link">
                <div class="card">
                    <img src="<?php echo e(asset('asset/department-icon.svg')); ?>" alt="" class="image-card">
                    <h1 class="card-name">Departments</h1>
                </div>
            </a>
            <a href="<?php echo e(route('position.index')); ?>" class="card-link">
                <div class="card">
                    <img src="<?php echo e(asset('asset/position-icon.svg')); ?>" alt="" class="image-card">
                    <h1 class="card-name">Positions</h1>
                </div>
            </a>
            <a href="<?php echo e(route('attendance.index')); ?>" class="card-link">
                <div class="card">
                    <img src="<?php echo e(asset('asset/attendance-icon.svg')); ?>" alt="" class="image-card">
                    <h1 class="card-name">Attendance</h1>
                </div>
            </a>
            <a href="<?php echo e(route('salary.index')); ?>" class="card-link">
                <div class="card">
                    <img src="<?php echo e(asset('asset/salary-icon.svg')); ?>" alt="" class="image-card">
                    <h1 class="card-name">Salaries</h1>
                </div>
            </a>
            <a href="<?php echo e(route('user.index')); ?>" class="card-link">
                <div class="card">
                    <img src="<?php echo e(asset('asset/admin-icon.svg')); ?>" alt="" class="image-card">
                    <h1 class="card-name">Admin</h1>
                </div>
            </a>
        </div>
        
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="logout-button">Logout</button>
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
<?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Website\resources\views/dashboard/index.blade.php ENDPATH**/ ?>