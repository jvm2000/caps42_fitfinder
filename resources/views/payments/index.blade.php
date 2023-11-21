<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Payment</title>
</head>

<body>
<form action="{{ route('payments.store') }}" method="post">
    @csrf
    <h1>Create Payment</h1>
    <label for="trainee_id">Trainee ID</label>
    <select id="trainee_id" name="trainee_id">
        @foreach ($requests as $request)
            <option value="{{ $request->requester->id }}">{{ $request->requester->id }}</option>
        @endforeach
    </select>
    <br>

    <label for="reference">Reference number:</label>
    <input type="text" name="reference" value="{{ old('reference') }}" required><br>
    <label for="amount">Amount:</label>
    <input type="text" name="amount" value="{{ old('amount') }}" required><br>

    <label for="startdate">Start Date:</label>
    <input type="date" name="startdate" value="{{ old('startdate') }}" required><br>

    <label for="enddate">End Date:</label>
    <input type="date" name="enddate" value="{{ old('enddate') }}" required><br>

    <button type="submit" name="submit" value="1">Create Payment</button>
</form>

</body>

</html>
