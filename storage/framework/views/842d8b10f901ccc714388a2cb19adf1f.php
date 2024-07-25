
<nav class="navbar">
    <h1 class="navbar-title">Employee Management</h1>
    <div class="menu">
        <a href="<?php echo e(route('dashboard')); ?>" class="navbar-link">Home</a>
        <a href="<?php echo e(route('employee.index')); ?>" class="navbar-link">Employees</a>
        <a href="<?php echo e(route('department.index')); ?>" class="navbar-link">Departments</a>
        <a href="<?php echo e(route('position.index')); ?>" class="navbar-link">Positions</a>
        <a href="<?php echo e(route('attendance.index')); ?>" class="navbar-link">Attendance</a>
        <a href="<?php echo e(route('salary.index')); ?>" class="navbar-link">Salaries</a>
        <a href="<?php echo e(route('user.index')); ?>" class="navbar-link">Admin</a>
    </div>
    <div class="hamburger-container" onclick="toggleSidebar()">
        <div class="hamburger"></div>
        <div class="hamburger"></div>
        <div class="hamburger"></div>
    </div>
</nav>

<div class="sidebar" id="sidebar">
    <ul class="sidebar-link"><a href="<?php echo e(route('dashboard')); ?>">Home</a></ul>
    <ul class="sidebar-link"><a href="<?php echo e(route('employee.index')); ?>">Employees</a></ul>
    <ul class="sidebar-link"><a href="<?php echo e(route('department.index')); ?>">Departments</a></ul>
    <ul class="sidebar-link"><a href="<?php echo e(route('position.index')); ?>">Positions</a></ul>
    <ul class="sidebar-link"><a href="<?php echo e(route('attendance.index')); ?>">Attendance</a></ul>
    <ul class="sidebar-link"><a href="<?php echo e(route('salary.index')); ?>">Salaries</a></ul>
    <ul class="sidebar-link"><a href="<?php echo e(route('user.index')); ?>">Admin</a></ul>
</div><?php /**PATH C:\Users\ACER\Documents\Project\Employee-Management-Web\resources\views/layout/navbar.blade.php ENDPATH**/ ?>