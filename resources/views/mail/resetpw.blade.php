<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Notification</title>
</head>
<body>
    <h1>Password Reset Notification</h1>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    
    <p><strong>Click the button below to reset your password:</strong></p>
    <p><a href="{{ $resetLink }}" style="display: inline-block; padding: 10px 20px; background-color: #3490dc; color: #ffffff; text-decoration: none;">Reset Password</a></p>

    <p>If you did not request a password reset, no further action is required.</p>

    <p>Thanks,<br>
    {{ config('app.name') }}</p>
</body>
</html>
