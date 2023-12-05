<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitFinder Receipt</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .receipt-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 2px solid #ccc; /* Border style for the receipt container */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            border-bottom: 2px solid #ccc; /* Border style for heading */
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 10px;
        }

        .thank-you-message {
            font-style: italic;
            color: #777;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <h2><b>FitFinder</b><h2>
        <h1>Contract Activated!</h1>
        <p>Trainee: {{ $payment->contract->trainee->first_name }} {{ $payment->contract->trainee->last_name }}</p>
        <p>Trainer: {{ $payment->contract->coach->first_name }} {{ $payment->contract->coach->last_name }}</p>
        <p>Amount Paid: {{ $payment->amount }}</p>
        <p>Ref: {{ $referenceNumber }}</p><br><br>

        <!-- Include other details you want in the receipt -->
        <p>Best regards,</p>
        <p>FitFinder</p><br><br>
        <p class="thank-you-message">Thank you for choosing FitFinder! 🌟 We appreciate your trust in us for your health and fitness journey.</p>

    </div>
</body>
</html>