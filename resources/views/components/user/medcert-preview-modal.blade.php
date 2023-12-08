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
      <div class="px-8 pt-6 pb-4 h-[44rem] overflow-y-auto">
        <div class="w-full h-auto">
          {{-- <img src="{{ $payment->getImageURL() }}" alt="GCash" class="w-full h-full"> --}}
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