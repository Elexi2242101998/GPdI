<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivasi Akun Anda</title>
    <style>
        /* Style untuk email */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        h1, h3 {
            text-align: center;
        }
        p {
            margin-bottom: 20px;
            text-align: center; /* Aligning paragraph to center */
        }
        .center {
            text-align: center; /* Aligning content inside the div to center */
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Aktivasi Akun Anda</h1>
        <h3>Halo, {{$user->name}}</h3>
        <p>Terima kasih telah mendaftar. Silakan klik tautan di bawah ini untuk mengaktifkan akun Anda:</p>
        <div class="center"> <!-- Centering content inside the div -->
            <p>
                <a href="{{url("/register/activation/$user->token_activation")}}">Aktivasi Akun</a>
            </p>
        </div>
        <p>Jika Anda tidak melakukan pendaftaran, Anda bisa mengabaikan email ini.</p>
        <p>Terima kasih.</p>
    </div>
</body>
</html>
