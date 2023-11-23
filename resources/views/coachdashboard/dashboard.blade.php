<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Dashboard</title>
</head>

<body>
    <h2>Welcome to Dashboard</h2>

    <h2>Pending Requests</h2>

    <table border="4">
        <thead>
            <tr>
                <th>Trainee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sentRequests as $req)
                <tr>
                    <td>{{ $req->requester->id }}</td>
                    <td>{{ $req->requester->first_name }}</td>
                    <td>{{ $req->requester->last_name }}</td>
                    <td>
                        @if ($req->status == 'Pending' && $req->payment)
                            <!-- If the request is pending and has associated payment, show approve and disapprove buttons -->
                            <form action="{{ route('coach.approvePayment', ['payment' => $req->payment->id]) }}" method="post">
                                @csrf
                                <button type="submit">Approve</button>
                            </form>
                            <form action="{{ route('coach.disapprovePayment', ['payment' => $req->payment->id]) }}" method="post">
                                @csrf
                                <button type="submit">Disapprove</button>
                            </form>
                        @elseif ($req->status != 'Pending')
                            <!-- If the request is already approved or disapproved, show a message or something else -->
                            {{ $req->status }}
                        @else
                            <!-- Handle the case where $req->payment is null -->
                            Payment not available
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
