<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
<form method="post" action="{{ route('payments.store') }}">
    @csrf

    <!-- Add fields for payment details -->
    <div class="form-group">
                <label for="coach_id">Select Coach:</label>
                <select name="coach_id" class="form-control">
                    <!-- Loop through available coaches -->
                    @foreach($coaches as $coach)
                        <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                    @endforeach
                </select>
    </div>

    <div class="form-group">
        <label for="reference">Reference Number:</label>
        <input type="text" name="reference" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" class="form-control" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="startdate">Start Date:</label>
        <input type="date" name="startdate" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="enddate">End Date:</label>
        <input type="date" name="enddate" class="form-control" required>
    </div>

    <!-- Hidden field to store the idField value -->
    <input type="hidden" name="idField" value="{{ $idField }}">

    <button type="submit" class="btn btn-primary">Create Payment</button>
</form>

</body>

</html>
