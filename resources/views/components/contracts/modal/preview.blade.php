<button onclick="openPreviewModal({{ $index }})" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
  <img src="/icons/contracts/preview-icon.svg" alt="" class="w-4 h-4">
</button>

<div id="previewModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">

  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-2xl bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <div class="flex items-center space-x-4">
          <p class="text-xl font-medium">Contract Details</p>
          @if(auth()->user()->role === 'Trainee')
            @if(!$pending->payment)
              <a href="/payments/create/{{ $pending->id }}">
                <div class="flex items-center space-x-4 bg-green-500 rounded-full text-white text-lg pr-2">
                  <p>Proceed to Payment -></p>
                </div>
              </a>
            @else
              <div class="flex items-center space-x-4 bg-gray-500 rounded-full text-black text-lg pr-6">
                <p>Already Paid</p>
              </div>
            @endif
          @endif
        </div>
        <button onclick="closePreviewModal({{ $index }})" class="absolute right-8 ">
          <img src="/icons/programs/close.svg" alt="" class="w-4 h-4 cursor-pointer active:mt-1">
        </button>
      </div>

      <div class="h-[44rem] overflow-y-auto">
        <div class="px-8 pt-6 pb-4">
          <div class="space-y-8">
            <div class="flex flex-col space-y-[2px]">
              <p class="text-base text-black">{{ $pending->coach->first_name }} {{ $pending->coach->last_name }} - <span class="font-medium">Coach</span></p>
              <p class="text-base text-black">{{ $pending->coach->address }} {{ $pending->coach->province }} {{ $pending->coach->zip_code }}</span></p>
              <p class="text-base text-black">{{ $pending->coach->email }}</p>
              <p class="text-base text-black">{{ $pending->coach->phone_number }}</p>
            </div>
  
            <div class="flex flex-col space-y-[2px]">
              <p class="text-base text-black">{{ $pending->trainee->first_name }} {{ $pending->trainee->last_name }} - <span class="font-medium">Trainee</span></p>
              <p class="text-base text-black">{{ $pending->trainee->address }} {{ $pending->trainee->city }}</p>
              <p class="text-base text-black">{{ $pending->trainee->email }}</p>
              <p class="text-base text-black">{{ $pending->trainee->phone_number }}</p>
            </div>
  
            <div class="flex flex-col space-y-[2px]">
              <p class="text-base text-black">FitFinder, Inc</p>
              <p class="text-base text-black">Sanciangko St, Cebu City, 6000 Cebu</p>
              <p class="text-base text-black">fitfinder@getfit.com</p>
            </div>
  
            <div class="flex flex-col space-y-8 indent-14">
              <p class="text-base text-black">WHEREAS, <span class="font-bold">{{ $pending->coach->first_name }} {{ $pending->coach->last_name }}</span> should provide coaching and training services, and <span class="font-bold">{{ $pending->trainee->first_name }} {{ $pending->trainee->last_name }}</span> seeks to engage the Coach to receive coaching and training services; and FitFinder, Inc. FitFinder operates a platform connecting Coaches and Trainees;</p>
  
              <p class="text-base text-black">NOW, THEREFORE, in consideration of the mutual covenants contained herein, the parties agree as
                follows:</p>
            </div>
  
            <div class="flex flex-col space-y-4">
              <p class="text-base text-black font-bold">1. COACHING AND TRAINING SERVICES</p>
              <p class="text-base text-black indent-14">1.1 The Coach agrees to provide coaching and training services to the Trainee. 
                These services may include, but are not limited to {{ $pending->program->name }}</p>
            </div>

            <div class="flex flex-col space-y-4">
              <p class="text-base text-black font-bold">2. PAYMENT</p>
              <p class="text-base text-black indent-14">2.1 The Trainee agrees to compensate the Coach for coaching and training services at the rate of 2000, and the designated payment method is GCash, as agreed upon between the parties.</p>
              <p class="text-base text-black indent-14">2.2 FitFinder shall receive a commission of 10% on all payments made by the Trainee to the Coach through the FitFinder platform.</p>
            </div>

            <div class="flex flex-col space-y-4">
              <p class="text-base text-black font-bold">3. TERM</p>
              <p class="text-base text-black indent-14">3.1 This Contract shall commence on {{ $pending->startdate }} and continue until terminated by either party with {{ $pending->enddate }} written notice.</p>
            </div>

            <div class="flex flex-col space-y-4">
              <p class="text-base text-black font-bold">4. CONFIDENTIALITY</p>
              <p class="text-base text-black indent-14">4.1 The Coach, Trainee, and FitFinder agree to maintain the confidentiality of all information 
                shared during the coaching and training sessions and not disclose or use such information for any 
                purpose other than the coaching and training.</p>
            </div>

            <div class="flex flex-col space-y-4">
              <p class="text-base text-black font-bold">5. DATA PRIVACY</p>
              <p class="text-base text-black indent-14">5.1 The parties acknowledge and agree that FitFinder may collect, process, and store personal data as necessary for the provision of services. FitFinder shall implement appropriate data security measures to protect the confidentiality and integrity of personal data.</p>
              <p class="text-base text-black indent-14">5.2 The parties agree to comply with all applicable data protection laws and regulations.</p>    
            </div>

            <div class="flex flex-col space-y-4">
              <p class="text-base text-black font-bold">6. TERMINATION</p>
              <p class="text-base text-black indent-14">6.1 Either party may terminate this Contract for any reason by providing written notice as specified in Section 3. Termination shall not relieve the parties of their obligations and responsibilities under this Contract.</p>
            </div>

            <div class="flex flex-col space-y-4">
              <p class="text-base text-black font-bold">7. ENTIRE AGREEMENT</p>
              <p class="text-base text-black indent-14">7.1 This Contract constitutes the entire agreement between the parties and supersedes all prior or contemporaneous agreements, understandings, and representations.</p>
            </div>

            <p class="text-base text-black">IN WITNESS WHEREOF, the parties have executed this Contract as of the date first above written.</p>

            <div class="flex items-center justify-between">
              <div class="flex flex-col space-y-[2px]">
                <div class="">
                  <p class="text-base text-black font-bold underline">{{ $pending->coach->first_name }} {{ $pending->coach->last_name }}</p>
                  <p class="text-base text-black">Coach</p>
                </div>
              </div>

              <div class="flex flex-col space-y-[2px] text-right">
                <div class="">
                  <p class="text-base text-black font-bold underline">{{ $pending->trainee->first_name }} {{ $pending->trainee->last_name }}</p>
                  <p class="text-base text-black">Trainee</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    </div>
  </div>
</div>

<script>
function openPreviewModal(index){
  var previewModal = document.getElementById('previewModal_' + index);
  if (previewModal) {
    previewModal.style.display = 'block';
  }
}

function closePreviewModal(index){
  var previewModal = document.getElementById('previewModal_' + index);
  if (previewModal) {
    previewModal.style.display = 'block';
  }
  previewModal.style.display = 'none';
}
</script>