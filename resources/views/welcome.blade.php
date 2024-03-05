<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-container {
            position: relative;
            width: 100%;
        }

        img {
            width: 100%;
            max-width: 100vw;
            height: auto;
            object-fit: cover;
        }

        .form-wrapper {
            position: absolute;
            top: 61%;
            left: 55%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            width: 90%; /* Adjusted width for responsiveness */
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box; /* Ensure padding and border are included in the width */
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%; /* Make the button full-width */
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .form-wrapper {
                padding: 15px;
            }

            h2 {
                font-size: 1.2em;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                font-size: 0.9em;
            }

            button[type="submit"] {
                font-size: 0.9em;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body class="antialiased">
    <div class="image-container">
        <img src="{{ asset('assets/full.png') }}" alt="Full Image">
        <div class="form-wrapper">
            <h2>Registration Form</h2>
            <form action="/register" method="POST"> @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
