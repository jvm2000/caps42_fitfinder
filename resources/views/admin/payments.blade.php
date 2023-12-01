<!-- admin.payments.index.blade.php -->

@foreach ($pendingPayments as $payment)
    <div>
        <p>Payment ID: {{ $payment->id }}</p>
        <p>Amount: {{ $payment->amount }}</p>
        <p>Reference: {{ $payment->reference }}</p>
        <p>Status: {{ $payment->status }}</p>

        @if ($payment->status === 'pending')
            <form action="{{ route('admin.payments.accept', ['paymentId' => $payment->id]) }}" method="post">
                @csrf
                <button type="submit">Accept Payment</button>
            </form>
        @endif
    </div>
@endforeach
