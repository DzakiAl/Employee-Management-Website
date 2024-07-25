<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Department</title>
    @vite(['resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- contents --}}
    <div class="content">
        <div class="button-container">
            <a href="{{ route('department.create') }}" class="button">Add Department</a>
            <a href="#" onclick="window.print()" class="button">Print</a>
        </div>
        <div class="table-container">
            <table class="table" border="10">
                <thead>
                    <tr>
                        <th class="table-header">Num</th>
                        <th class="table-header">Department name</th>
                        <th class="table-header action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td class="table-body">{{ $loop->iteration }}</td>
                            <td class="table-body">{{ $department->department_name }}</td>
                            <td class="table-body action-column">
                                <a href="{{route('department.edit', $department)}}" class="action-button">Edit</a>
                                <form action="{{route('department.destroy', $department)}}" method="POST" style="margin: 0; padding: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="action-button"
                                        onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
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
