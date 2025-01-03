<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login {{ ucfirst($role) }}</title>
</head>
<body>
    <h1>Login {{ ucfirst($role) }}</h1>

    <form action="{{ route('login.submit', ['role' => strtolower($role)]) }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>
