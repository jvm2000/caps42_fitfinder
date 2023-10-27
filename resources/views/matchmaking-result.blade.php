<!DOCTYPE html>
<html>
<head>
    <title>Matchmaking Result</title>
</head>
<body>
    
    <h1>Matchmaking Result</h1>
    <p>Trainee ID: {{ $t_id }}</p>
    <p>Trainee Tags: {{ $traineeTags }}</p>
    @if ($matchingTrainers->count() > 0)
        <h2>Matching Trainers:</h2>
        @foreach ($matchingTrainers as $trainer)
        <p>Trainer: {{ $trainer->trainer_fname }} {{ $trainer->trainer_lname }}</p>
        <form action="{{ route('send.request') }}" method="post">
            @csrf <!-- Place @csrf within the form -->
            <input type="hidden" name="trainee_id" value="{{ $t_id }}">
            <input type="hidden" name="trainer_id" value="{{ $trainer->trainer_id }}">
            <button type="submit" name="sendRequest">Send Request</button>
        </form>
    @endforeach
    @else
        <p>No matching trainers found.</p>
    @endif
    <p><a href="/matchmaking">Back to Matchmaking</a></p>
</body>
</html>