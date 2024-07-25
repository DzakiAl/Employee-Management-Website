<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Position</title>
    @vite(['resources/css/form.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- content --}}
    <div class="content">
        <form class="form" action="{{route('position.update', $position)}}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="form-title">Edit Position</h1>
            <p class="input-label">Position name:</p>
            <input type="text" name="position_name" class="input" placeholder="Enter position name" value="{{$position->position_name}}" required>
            <p class="input-label">Salary range:</p>
            <input type="text" name="salary_range" class="input" placeholder="Enter salary range" value="{{$position->salary_range}}" required>
            <div class="button-container">
                <button type="submit" class="button">Save</button>
                <a href="{{ route('position.index') }}" class="second-button">Cancel</a>
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
