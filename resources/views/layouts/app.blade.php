<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #72edf2 10%, #5151e5 100%);
        }
        .navbar-brand {
            font-weight: 700;
            color: #fff !important;
        }
        .nav-link {
            color: #fff !important;
            transition: color 0.2s ease-in-out;
        }
        .nav-link:hover {
            color: #f1c40f !important;
        }
        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml,<svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"><path stroke="rgba%28255, 255, 255, 0.5%29" stroke-width="2" linecap="round" linejoin="round" d="M4 7h22M4 15h22M4 23h22"/></svg>');
        }
        .container {
            margin-top: 20px;
        }
        .footer {
            background-color: #f7f9fc;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #ddd;
            margin-top: 40px;
        }
        .footer p {
            margin: 0;
            color: #555;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="{{ url('/') }}">GoBlogTenan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/admin') }}">Admin</a></li>
            </ul>
        </div>
    </nav>
    <div class="container py-4">
        @yield('content')
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Laravel Project. All rights reserved by Yulia Vhoskia.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
