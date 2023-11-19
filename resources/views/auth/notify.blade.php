<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Email Verification Notice') }}</div>

                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            <p>Due to security reasons, you must verify your email to access this feature.<br><br>
                            Did't receive any?</p>
                            <form method="POST" action="/email/verification-notification">
                                @csrf
                                <button 
                                type="submit"
                                class="rounded-md text-center px-6 py-3 text-md text-white bg-black cursor-pointer w-full"
                              >Click to resend verification</button></form>
                              <a href="/home">Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>