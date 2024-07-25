<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salary</title>
    @vite(['resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- contents --}}
    <div class="content">
        <div class="button-container">
            <a href="{{ route('salary.create') }}" class="button">Add Salary</a>
            <a href="#" onclick="window.print()" class="button">Print</a>
        </div>
        <div class="table-container">
            <table class="table" border="10">
                <thead>
                    <tr>
                        <th class="table-header">Num</th>
                        <th class="table-header">Name</th>
                        <th class="table-header">Amount</th>
                        <th class="table-header">Bonus</th>
                        <th class="table-header">Deductions</th>
                        <th class="table-header">Net Pay</th>
                        <th class="table-header">Pay Date</th>
                        <th class="table-header action-column">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salaries as $salary)
                        <tr>
                            <td class="table-body">{{$loop->iteration}}</td>
                            <td class="table-body">{{$salary->employee->first_name}} {{$salary->employee->last_name}}</td>
                            <td class="table-body">${{$salary->amount}}</td>
                            <td class="table-body">${{$salary->bonus}}</td>
                            <td class="table-body">${{$salary->deductions}}</td>
                            <td class="table-body">${{$salary->net_pay}}</td>
                            <td class="table-body">{{$salary->pay_date}}</td>
                            <td class="table-body action-column">
                                <a href="{{ route('salary.edit', $salary) }}" class="action-button">Edit</a>
                                <form action="{{ route('salary.destroy', $salary) }}" method="POST"
                                    style="margin: 0; padding: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="action-button"
                                        onclick="return confirm('Are you sure you want to delete this salary?')">Delete</button>
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