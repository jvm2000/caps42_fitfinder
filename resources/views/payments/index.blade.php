<!-- payments.index.blade.php -->

@foreach ($contracts as $contract)
    <div>
        <!-- Display contract details -->
        <p>Contract ID: {{ $contract->id }}</p>
        <p>Program ID: {{ $contract->programs_id }}</p>
        <p>Coach ID: {{ $contract->coach_id }}</p>
        <p>Trainee ID: {{ $contract->trainee_id }}</p>
        <!-- Add other contract details as needed -->

        <!-- Add a form for making payments -->
        <form action="{{ route('payments.make-payment', ['contractId' => $contract->id]) }}" method="post">
            @csrf
            @method('post')

            <!-- Input for payment reference -->
            <input type="text" name="reference" placeholder="Enter reference" required>

            <!-- Input for payment amount -->
            <input type="number" name="amount" placeholder="Enter amount" required>

            <!-- Hidden input for payment status with a default value -->
            <input type="hidden" name="status" value="pending">

            <!-- Submit button -->
            <button type="submit">Make Payment</button>
        </form>


    </div>
@endforeach
