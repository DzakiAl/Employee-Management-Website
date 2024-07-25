<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Salary</title>
    @vite(['resources/css/form.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- content --}}
    <div class="content">
        <form class="form" action="{{route('salary.update', $salary)}}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="form-title">Edit Salary</h1>
            <p class="input-label">Select employee:</p>
            <select name="employee_id" class="input">
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $salary->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
            </select>
            <p class="input-label">Amount:</p>
            <input type="number" class="input" name="amount" placeholder="Enter amount" value="{{$salary->amount}}" required>
            <p class="input-label">bonus:</p>
            <input type="number" class="input" name="bonus" placeholder="Enter bonus" value="{{$salary->bonus}}" required>
            <p class="input-label">Deductions:</p>
            <input type="number" class="input" name="deductions" placeholder="Enter deductions" value="{{$salary->deductions}}" required>
            <p class="input-label">Pay date:</p>
            <input type="date" class="input" name="pay date" placeholder="Enter pay date" value="{{$salary->pay_date}}" required>
            <div class="button-container">
                <button type="submit" class="button">Save</button>
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