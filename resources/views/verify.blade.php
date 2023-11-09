<!DOCTYPE html>
<html>
<head>
    <title>Verification Code</title>
</head>
<body>
    <h2>Enter Verification Code</h2>
    <form method="post" action="{{ route('verify.login') }}">
        @csrf
        <div class="form-group">
            <label for="verification_code">Verification Code:</label>
            <input type="text" name="verification_code" id="verification_code" required>
        </div>
        <button type="submit">Verify</button>
    </form>
</body>
</html>
