<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance</title>
    @vite(['resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- contents --}}
    <div class="content">
        <div class="button-container">
            <a href="{{ route('attendance.create') }}" class="button">Add Attendance</a>
            <a href="#" onclick="window.print()" class="button">Print</a>
        </div>
        <div class="filter-container">
            <form action="{{ route('attendance.index') }}" method="GET">
                <label for="filter_date" class="label_date">Filter by Date:</label>
                <input type="date" id="filter_date" class="input_date" name="filter_date"
                    value="{{ request('filter_date') }}">
                <button type="submit" class="button_submit">Filter</button>
            </form>
        </div>
        <div class="table-container">
            <table class="table" border="10">
                <thead>
                    <tr>
                        <th class="table-header">Num</th>
                        <th class="table-header">Name</th>
                        <th class="table-header">Date</th>
                        <th class="table-header">Check in time</th>
                        <th class="table-header">Check out time</th>
                        <th class="table-header">Status</th>
                        <th class="table-header action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendances as $attendance)
                        <tr>
                            <td class="table-body">{{ $loop->iteration }}</td>
                            <td class="table-body">{{ $attendance->employee->first_name }}
                                {{ $attendance->employee->last_name }}</td>
                            <td class="table-body">{{ $attendance->date }}</td>
                            <td class="table-body">{{ $attendance->check_in_time }}</td>
                            <td class="table-body">{{ $attendance->check_out_time }}</td>
                            <td class="table-body">{{ $attendance->status }}</td>
                            <td class="table-body action-column">
                                <a href="{{ route('attendance.edit', $attendance) }}" class="action-button">Edit</a>
                                <form action="{{ route('attendance.destroy', $attendance) }}" method="POST" style="margin: 0; padding: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="action-button"
                                        onclick="return confirm('Are you sure you want to delete this attendance?')">Delete</button>
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
        // Set the default date to today's date if no date is selected
        document.addEventListener('DOMContentLoaded', function() {
            const filterDateInput = document.getElementById('filter_date');
            if (!filterDateInput.value) {
                const today = new Date().toISOString().split('T')[0];
                filterDateInput.value = today;
            }

            // Display success message
            @if (session('success'))
                alert('{{ session('success') }}');
            @endif
        });

        // Toggle sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>