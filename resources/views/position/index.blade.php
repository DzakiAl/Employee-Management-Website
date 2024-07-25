<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Position</title>
    @vite(['resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- contents --}}
    <div class="content">
        <div class="button-container">
            <a href="{{ route('position.create') }}" class="button">Add Position</a>
            <a href="#" onclick="window.print()" class="button">Print</a>
        </div>
        <div class="table-container">
            <table class="table" border="10">
                <thead>
                    <tr>
                        <th class="table-header">Num</th>
                        <th class="table-header">Position name</th>
                        <th class="table-header">Salary range</th>
                        <th class="table-header action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td class="table-body">{{ $loop->iteration }}</td>
                            <td class="table-body">{{ $position->position_name }}</td>
                            <td class="table-body">{{ $position->salary_range }}</td>
                            <td class="table-body action-column">
                                <a href="{{route('position.edit', $position)}}" class="action-button">Edit</a>
                                <form action="{{route('position.destroy', $position)}}" method="POST" style="margin: 0; padding: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="action-button"
                                        onclick="return confirm('Are you sure you want to delete this position?')">Delete</button>
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