<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .container {
            text-align: center;
        }
        .card-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 50px;
        }
        .card {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 200px;
            padding: 20px;
            text-align: center;
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: scale(1.05);
            cursor: pointer;
        }
        .card h3 {
            margin-bottom: 20px;
        }
        .card a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .card a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang!</h1>
        <p>Pilih peran Anda:</p>
        <div class="card-container">
            <div class="card">
                <h3>User</h3>
                <a href="{{ route('register') }}">Login sebagai User</a>
            </div>
            
            <div class="card">
                <h3>Vendor</h3>
                <a href="{{ route('login', ['role' => 'vendor']) }}">Login sebagai Vendor</a>
            </div>
           
        </div>
    </div>
</body>
</html>
