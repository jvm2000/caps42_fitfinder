<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Completion Certificate</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .certificate {
            width: 800px;
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 5px solid #3498db; /* Border color: Change as needed */
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        h1 {
            color: #3498db;
        }
        h2{
            text-align: center;
        }
        p {
            text-align: center;
            font-size: 18px;
        }
        .message {
            margin-top: 30px;
            font-size: 16px;
            text-align: center;
        }
        .signature {
            margin-top: 50px;
            text-align: center;
        }
        .signature img {
            width: 150px;
            height: auto;
            margin-top: 10px;
        }
        .logo {
            text-align: center;
            margin-top: 20px;
        }
        .logo img {
            width: 100px; /* Adjust the width as needed */
            height: auto;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="header">
            <h1>Certificate of Completion</h1>
        </div>
        <p>This is to certify that</p>
        <h2>{{ $enrollee->trainee->first_name }}</h2>
        <div class="message">
            <p>has successfully completed the course on</p>
            <p><strong>{{ $enrollee->program->name }}</strong></p>
            <p>with a completion percentage of 100%.</p>
            <p>Issued on {{ date('F j, Y') }}</p>
        </div>
        <div class="signature">
            <p>{{ $enrollee->coach->first_name }}</p>
            <p>Course Instructor</p>
        </div>
    </div>
</body>
</html>