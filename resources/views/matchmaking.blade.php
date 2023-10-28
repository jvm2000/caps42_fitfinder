<!DOCTYPE html>
<html>
<head>
    <title>Matchmaking</title>
</head>
<body>
    <h1>Matchmaking</h1>
    <h2>Your Tags: {{ $traineeTags ?? 'No tags found' }}</h2>

    <form action="{{ route('matchmaking.result') }}" method="get">
        @csrf
        <input type="hidden" name="trainee_id" value="{{ $traineeId }}">
        <button type="submit">Find Trainer</button>
    </form>

    <p><a href="">Back to Trainee Dashboard</a></p>
</body>
</html>
