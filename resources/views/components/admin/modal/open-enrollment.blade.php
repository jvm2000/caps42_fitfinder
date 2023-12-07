<button 
  onclick="openEnrollmentModal({{ $index }})"
  class="rounded-md flex items-center px-3 py-2 text-md text-white bg-gray-800 cursor-pointer active:mt-[1px]"
>
  Enroll
</button>

<div id="enrollmentModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">

  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-md bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl font-medium">Enroll Account</p>
        <button onclick="closeEnrollmentModal({{ $index }})" class="absolute right-8 ">
          <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4cursor-pointer active:mt-1">
        </button>
      </div>
      {{-- Slot  --}}
      <div class="px-8 pt-6 pb-2">
        <div class="flex flex-col">
          <div class="w-full flex flex-col items-center pt-4 pb-6 space-y-6">
            <p class="text-lg text-center">You are now enrolling 
              <span class="font-semibold">{{ $payment->contract->trainee->first_name }} {{ $payment->contract->trainee->last_name }}</span>
              into the program
              <span class="font-semibold">{{ $payment->contract->program->name }}</span>
            </p>

            <div class="flex items-center space-x-6">
              <div class="w-24 h-24 rounded-full">
                <img src="{{$payment->contract->trainee->getImageURL()}}" alt="" class="w-full h-full rounded-full">
              </div>
              <img src="/icons/general/arrow-icon.svg" alt="" class="w-10 h-10">
              <div class="w-24 h-24 rounded-full">
                <img src="{{$payment->contract->program->getImageURL()}}" alt="" class="w-full h-full rounded-full">
              </div>
            </div>

          </div>
          <div class="flex flex-col items-center pt-4 space-y-2 px-3">
            <p class="text-base">Please type <span class="font-semibold">"agree"</span> to continue enrolling</p>
            <input type="text" class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md text-center" id="agreeInput">
          </div>

          <div class="w-full px-3 pt-4">
            <form action="/admin/payments/enroll" method="POST">
              @csrf
              <input type="hidden" name="trainee_id" value="{{ $payment->contract->trainee->id }}">
              <input type="hidden" name="coach_id" value="{{ $payment->contract->coach->id }}">
              <input type="hidden" name="program_id" value="{{ $payment->contract->program->id }}">
              <button 
                class="rounded-md flex items-center w-full py-4 justify-center text-base text-white bg-gray-800 cursor-pointer font-semibold disabled:bg-gray-600 disabled:cursor-not-allowed" 
                type="submit"
                id="submitButton" 
                disabled
              >Enroll</button>
            </form>
          </div>
        </div>
      </div>
  
    </div>
  </div>
</div>

<script>
function openEnrollmentModal(index){
  var enrollmentModal = document.getElementById('enrollmentModal_' + index);
  enrollmentModal.style.display = 'block';
}

function closeEnrollmentModal(index){
  var enrollmentModal = document.getElementById('enrollmentModal_' + index);
  enrollmentModal.style.display = 'none';
}

document.addEventListener("DOMContentLoaded", function () {
  var agreeInput = document.getElementById("agreeInput");
  var submitButton = document.getElementById("submitButton");

  agreeInput.addEventListener("input", function () {
    if (agreeInput.value.toLowerCase() === "agree") {
      submitButton.removeAttribute("disabled");
    } else {
      submitButton.setAttribute("disabled", "disabled");
    }
  });
});
</script>