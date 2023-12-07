<button 
  onclick="openPaymentModal({{ $index }})"
  class="rounded-md flex items-center px-3 py-2 text-md text-white bg-green-500 cursor-pointer active:mt-[1px]"
>
  Make Payment
</button>

<div id="paymentModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">

  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-md bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl font-medium">Payment Account Preview</p>
        <button onclick="closePaymentModal({{ $index }})" class="absolute right-8 ">
          <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4cursor-pointer active:mt-1">
        </button>
      </div>
      {{-- Slot  --}}
      <div class="px-8 pt-6 pb-2">
        <div class="flex flex-col">
          <div class="w-full flex flex-col items-center pt-4 pb-6 space-y-4">
            <img src="/icons/general/gcash-icon.svg" alt="" class="w-24 h-24 rounded-xl">

            <div class="flex flex-col text-center">
              <p class="text-3xl font-bold">{{ $payment->contract->coach->transaction->first_name }} {{ $payment->contract->coach->transaction->last_name }}</p>
              <p class="text-xl text-indigo-500">{{ $payment->contract->coach->transaction->mobile_number }}</p>
            </div>

            <div class="flex flex-col text-center">
              <p class="text-xl">{{ $payment->contract->not_discounted }} minus 10% = {{ $payment->contract->amount }}</p>
            </div>

            <form action="/admin/payments/accept/{{ $payment->id }}" method="POST">
              @csrf
              <input type="hidden" name="temail" value="{{ $payment->contract->trainee->email }}">
              <input type="hidden" name="cemail" value="{{ $payment->contract->coach->email }}">
              <button 
                type="submit"
                class="rounded-md flex items-center px-6 py-3 text-sm text-white bg-blue-500 cursor-pointer active:mt-[1px]"
              >
                Accept
              </button>
            </form>
          </div>
        </div>
      </div>
  
    </div>
  </div>
</div>

<script>
function openPaymentModal(index){
  var paymentModal = document.getElementById('paymentModal_' + index);
  paymentModal.style.display = 'block';
}

function closePaymentModal(index){
  var paymentModal = document.getElementById('paymentModal_' + index);
  paymentModal.style.display = 'none';
}
</script>