<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaching Contract</title>
</head>

<body>
    <form action="{{ route('contracts.store') }}" method="post">
        @csrf
        <h1>Contract</h1>

        <h2>Trainee Details</h2>
        <p>
            <label for="traineeUsername">Trainee Name:</label>
            <select id="traineeUsername" name="traineeUsername">
                @foreach ($requests as $request)
                <option value="{{ $request->requester->id }}">{{ $request->requester->first_name . ' ' . $request->requester->last_name }}</option>
                @endforeach
            </select><br>
            <label for="traineeAddress">Trainee Address:</label>
            <input type="text" name="traineeAddress" value="{{ $requests[0]->requester->address . ' ' . $requests[0]->requester->city }}"><br>
            <label for="traineeEmailAddress">Trainee Email Address:</label>
            <input type="text" name="traineeEmailAddress" value="{{ $requests[0]->requester->email }}"><br>
            <label for="traineePhoneNumber">Trainee Phone Number:</label>
            <input type="text" name="traineePhoneNumber" value="{{ $requests[0]->requester->phone_number }}"><br>
        </p>

        <strong>
            <label for="programs">Select a Program:</label>
            <select id="programs" name="programs">
                @foreach($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
                @endforeach
            </select>
        </strong><br>

        <strong>
            <label for="paymentType">Select Payment:</label>
            <select id="paymentType" name="paymentType">
                <option value="gcash">GCASH</option>
                <option value="paypal">PAYPAL</option>
                <option value="applepay">APPLEPAY</option>
            </select>
        </strong><br>

        <strong>
            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate" name="startDate">
        </strong><br>

        <strong>
            <label for="endDate">End Date:</label>
            <input type="date" id="endDate" name="endDate">
        </strong><br>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>
