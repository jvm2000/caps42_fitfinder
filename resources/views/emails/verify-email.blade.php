<!DOCTYPE html>
<html>
<head>
    <title>Verify Email</title>
</head>
<body>
    <h1>Thanks for registering!</h1>
    <p>Please verify your email by clicking the link below:</p>
    <a href="{{ route('verification.verify', $user->id) }}">Verify Email</a>
</body>
</html>