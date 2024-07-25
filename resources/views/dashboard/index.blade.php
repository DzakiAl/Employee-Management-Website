<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Management Website</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- content --}}
    <div class="content">
        {{-- welcome title --}}
        @auth
            <p class="welcome-title">Welcome back, {{ Auth::user()->username }}</p>
        @else
            <p>You are not logged in.</p>
        @endauth
        {{-- card --}}
        <div class="card-container">
            <a href="{{route('employee.index')}}" class="card-link">
                <div class="card">
                    <img src="{{ asset('asset/employee-icon.svg') }}" alt="" class="image-card">
                    <h1 class="card-name">Employees</h1>
                </div>
            </a>
            <a href="{{route('department.index')}}" class="card-link">
                <div class="card">
                    <img src="{{ asset('asset/department-icon.svg') }}" alt="" class="image-card">
                    <h1 class="card-name">Departments</h1>
                </div>
            </a>
            <a href="{{route('position.index')}}" class="card-link">
                <div class="card">
                    <img src="{{ asset('asset/position-icon.svg') }}" alt="" class="image-card">
                    <h1 class="card-name">Positions</h1>
                </div>
            </a>
            <a href="{{route('attendance.index')}}" class="card-link">
                <div class="card">
                    <img src="{{ asset('asset/attendance-icon.svg') }}" alt="" class="image-card">
                    <h1 class="card-name">Attendance</h1>
                </div>
            </a>
            <a href="{{route('salary.index')}}" class="card-link">
                <div class="card">
                    <img src="{{ asset('asset/salary-icon.svg') }}" alt="" class="image-card">
                    <h1 class="card-name">Salaries</h1>
                </div>
            </a>
            <a href="{{route('user.index')}}" class="card-link">
                <div class="card">
                    <img src="{{ asset('asset/admin-icon.svg') }}" alt="" class="image-card">
                    <h1 class="card-name">Admin</h1>
                </div>
            </a>
        </div>
        {{-- logout button --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
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
            @if (session('success'))
                alert('{{ session('success') }}');
            @endif
        });
    </script>
</body>
</html>
