<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/form.css', 'resources/js/app.js'])
</head>
<body>
    {{-- navbar and sidebar --}}
    @include('layout.navbar')
    {{-- content --}}
    <div class="content" style="padding: 3vw 0 0 0">
        <h1 class="form-title">Edit Admin</h1>
        {{-- Change Username Form --}}
        <form class="form" action="{{ route('user.updateUsername', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <p class="input-label">Username:</p>
            <input type="text" class="input" name="username" placeholder="Enter new username" value="{{ $user->username }}" required>
            @if ($errors->any() && $errors->has('username'))
                @foreach ($errors->get('username') as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif
            <div class="button-container">
                <button type="submit" class="button">Save Username</button>
            </div>
        </form>

        {{-- Change Password Form --}}
        <form class="form" action="{{ route('user.updatePassword', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <p class="input-label">Previous Password:</p>
            <input type="password" class="input" name="prev_password" placeholder="Enter current password" required>
            @if ($errors->has('prev_password'))
                <p class="error">{{ $errors->first('prev_password') }}</p>
            @endif
            <p class="input-label">New Password:</p>
            <input type="password" class="input" name="new_password" placeholder="Enter new password" required>
            <div class="button-container">
                <button type="submit" class="button">Save Password</button>
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