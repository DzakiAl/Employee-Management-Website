<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
    @vite(['resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- content --}}
    <div class="content">
        <div class="button-container">
            <a href="{{ route('employee.create') }}" class="button">Add Employee</a>
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
                    @foreach ($employees as $employee)
                        <tr>
                            <td class="table-body">{{ $loop->iteration }}</td>
                            <td class="table-body photo-column">
                                <img src="{{ asset('photo/' . $employee->photo) }}" alt="photo of employee" class="photo">
                            </td>
                            <td class="table-body">{{ $employee->first_name }}</td>
                            <td class="table-body">{{ $employee->last_name }}</td>
                            <td class="table-body">{{ $employee->date_of_birth }}</td>
                            <td class="table-body">{{ $employee->gender }}</td>
                            <td class="table-body">{{ $employee->email }}</td>
                            <td class="table-body">{{ $employee->phone }}</td>
                            <td class="table-body">{{ $employee->address }}</td>
                            <td class="table-body">{{ $employee->date_hired }}</td>
                            <td class="table-body">{{ $employee->position ? $employee->position->position_name : 'No Position' }}                            </td>
                            <td class="table-body">{{ $employee->department ? $employee->department->department_name : 'No Department'  }}</td>
                            <td class="table-body">{{ $employee->status }}</td>
                            <td class="table-body action-column">
                                <a href="{{ route('employee.edit', $employee) }}" class="action-button">Edit</a>
                                <form action="{{ route('employee.destroy', $employee) }}" method="POST" style="margin: 0; padding: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="action-button" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

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
