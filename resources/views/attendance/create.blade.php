<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Attendance</title>
    @vite(['resources/css/form.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- content --}}
    <div class="content">
        <form class="form" action="{{route('attendance.store')}}" method="POST">
            @csrf
            <h1 class="form-title">Add Attendance</h1>
            <p class="input-label">Select Employee:</p>
            <select name="employee_id" class="input">
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
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
                <a href="{{ route('attendance.index') }}" class="second-button">Cancel</a>
            </div>
        </form>
    </div>
    {{-- javascript --}}
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