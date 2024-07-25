<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    @vite(['resources/css/login.css', 'resources/js/app.js'])
</head>
<body>
    <form class="form" action="{{ route('login') }}" method="POST">
        @csrf
        <h1 class="login-title">Log In</h1>
        <input class="input" type="text" name="username" placeholder="Enter your username" required>
        <input class="input" type="password" name="password" placeholder="Enter your password" required>
        @error('username')
            <a class="error">{{ $message }}</a>
        @enderror
        @error('password')
            <a class="error">{{ $message }}</a>
        @enderror
        <button class="button">Log In</button>
    </form>
</body>
</html>
