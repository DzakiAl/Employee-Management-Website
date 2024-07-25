<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Employee</title>
    @vite(['resources/css/form.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- content --}}
    <div class="content">
        <form class="form" action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1 class="form-title">Add Employee</h1>
            <p class="input-label">Upload photo:</p>
            <input type="file" class="input-file" name="photo" required>
            <p class="input-label">First name:</p>
            <input type="text" class="input" name="first_name" placeholder="Enter first name" required>
            <p class="input-label">Last name:</p>
            <input type="text" class="input" name="last_name" placeholder="Enter last name" required>
            <p class="input-label">Date of birth:</p>
            <input type="date" class="input" name="date_of_birth" required>
            <p class="input-label">Gender:</p>
            <input type="text" class="input" name="gender" placeholder="Enter gender" required>
            <p class="input-label">Email:</p>
            <input type="email" class="input" name="email" placeholder="Enter email" required>
            <p class="input-label">Phone number:</p>
            <input type="number" class="input" name="phone" placeholder="Enter phone number" required>
            <p class="input-label">Address:</p>
            <input type="text" class="input" name="address" placeholder="Enter address" required>
            <p class="input-label">Date hired:</p>
            <input type="date" class="input" name="date_hired" required>
            <p class="input-label">Position:</p>
            <select name="position" class="input">
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                @endforeach
            </select>
            <p class="input-label">Department:</p>
            <select name="department" class="input">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                @endforeach
            </select>
            <p class="input-label">Status:</p>
            <select name="status" class="input">
                <option value="Active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <div class="button-container">
                <button type="submit" class="button">Add</button>
                <a href="{{ route('employee.index') }}" class="second-button">Cancel</a>
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