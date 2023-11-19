<!DOCTYPE html>
<html>
<head>
    <title>Verify Email</title>
</head>
<body>
    <h1>Thanks for registering!</h1>
    <p>A link has been sent to your email for verification.<br>
    Did't receive any?</p><br><br>
    <form method="POST" action="/email/verification-notification">
        @csrf
        <button 
        type="submit"
        class="rounded-md text-center px-6 py-3 text-md text-white bg-black cursor-pointer w-full"
      >Click to resend verification</button></form>
      <a href="/home">Skip</a>
</body>
</html>