{{-- navbar --}}
<nav class="navbar">
    <h1 class="navbar-title">Employee Management</h1>
    <div class="menu">
        <a href="{{route('dashboard')}}" class="navbar-link">Home</a>
        <a href="{{route('employee.index')}}" class="navbar-link">Employees</a>
        <a href="{{route('department.index')}}" class="navbar-link">Departments</a>
        <a href="{{route('position.index')}}" class="navbar-link">Positions</a>
        <a href="{{route('attendance.index')}}" class="navbar-link">Attendance</a>
        <a href="{{route('salary.index')}}" class="navbar-link">Salaries</a>
        <a href="{{route('user.index')}}" class="navbar-link">Admin</a>
    </div>
    <div class="hamburger-container" onclick="toggleSidebar()">
        <div class="hamburger"></div>
        <div class="hamburger"></div>
        <div class="hamburger"></div>
    </div>
</nav>
{{-- sidebar --}}
<div class="sidebar" id="sidebar">
    <ul class="sidebar-link"><a href="{{route('dashboard')}}">Home</a></ul>
    <ul class="sidebar-link"><a href="{{route('employee.index')}}">Employees</a></ul>
    <ul class="sidebar-link"><a href="{{route('department.index')}}">Departments</a></ul>
    <ul class="sidebar-link"><a href="{{route('position.index')}}">Positions</a></ul>
    <ul class="sidebar-link"><a href="{{route('attendance.index')}}">Attendance</a></ul>
    <ul class="sidebar-link"><a href="{{route('salary.index')}}">Salaries</a></ul>
    <ul class="sidebar-link"><a href="{{route('user.index')}}">Admin</a></ul>
</div>