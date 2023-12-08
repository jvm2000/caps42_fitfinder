<div onclick="openPreviewModal({{ $index }})" class="cursor-pointer">
  <img src="/icons/contracts/preview-icon.svg" alt="" class="w-4 h-4">
</div>

<div id="previewModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">

  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl font-medium">About {{ $requester->first_name }} {{ $requester->last_name }}</p>
        <div onclick="closePreviewModal({{ $index }})" class="absolute right-8 ">
          <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4 cursor-pointer active:mt-1">
        </div>
      </div>
      {{-- Slot  --}}
      <div class="px-8 pt-6 pb-10 h-[52rem] overflow-y-auto">
        <div class="w-full h-auto space-y-4">
          <div class="space-y-2">
            <span class="text-md text-gray-600 text-left">Description</span>
            <div class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border-b rounded-md">
              <p>{{ $requester->medcert->description }}</p>
            </div>
          </div>

          <div class="space-y-2">
            <span class="text-md text-gray-600 text-left">Medical Status Uploaded:</span>
            <div class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border-b rounded-md">
              <p>{{ $requester->medcert->status }}</p>
            </div>
          </div>

          <div class="space-y-2">
            <span class="text-md text-gray-600 text-left">Started Fitness</span>
            <div class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border-b rounded-md">
              <p>{{ $requester->medcert->started_fitness }}</p>
            </div>
          </div>

          <div class="space-y-2">
            <span class="text-md text-gray-600 text-left">Medical Certificate</span>
            <div class="bg-inherit text-lg px-8 py-2 w-full h-44 border-gray-500 border-b rounded-md">
              <img src="{{ $requester->medcert->getMedURL() }}" alt="">
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
  previewModal.style.display = 'block';
}

function closePreviewModal(index){
  var previewModal = document.getElementById('previewModal_' + index);
  previewModal.style.display = 'none';
}
</script>