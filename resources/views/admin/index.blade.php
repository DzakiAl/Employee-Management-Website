<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    @vite(['resources/css/index.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- content --}}
    <div class="content">
        <div class="button-container">
            <a href="{{ route('user.create') }}" class="button">Add Admin</a>
        </div>
        <div class="table-container">
            <table class="table" border="10">
                <thead>
                    <tr>
                        <th class="table-header">Num</th>
                        <th class="table-header">Username</th>
                        <th class="table-header">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="table-body">{{ $loop->iteration }}</td>
                            <td class="table-body">{{ $user->username }}</td>
                            <td class="table-body">
                                <a href="{{ route('user.edit', $user) }}" class="action-button">Edit</a>
                                @if (auth()->id() === $user->id)
                                    <form action="{{ route('user.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="action-button" onclick="return confirm('Are you sure you want to delete your account?')">Delete</button>
                                    </form>
                                @endif
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