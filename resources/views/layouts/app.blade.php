<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User CRUD</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
         body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            padding: 40px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(65, 64, 64, 0.1);
            overflow-x: auto;
            padding: 20px;
            /* border: 1px solid #e5e7eb; */
            /* border-radius: 12px; */
        }
    </style>
     @yield('head')
</head>
<body>
    @yield('content')
</body>
</html>
