<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add salary</title>
    @vite(['resources/css/form.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- content --}}
    <div class="content">
        <form class="form" action="{{route('salary.store')}}" method="POST">
            @csrf
            <h1 class="form-title">Add Salary</h1>
            <p class="input-label">Select employee:</p>
            <select name="employee_id" class="input">
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
            </select>
            <p class="input-label">Amount:</p>
            <input type="number" class="input" name="amount" placeholder="Enter amount" required>
            <p class="input-label">Bonus:</p>
            <input type="number" class="input" name="bonus" placeholder="Enter bonus" required>
            <p class="input-label">Deductions:</p>
            <input type="number" class="input" name="deductions" placeholder="Enter deductions" required>
            <p class="input-label">Pay date:</p>
            <input type="date" class="input" name="pay date" placeholder="Enter pay date" required>
            <div class="button-container">
                <button type="submit" class="button">Add</button>
                <a href="{{ route('salary.index') }}" class="second-button">Cancel</a>
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