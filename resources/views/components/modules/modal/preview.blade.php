<style>
  #preview-container {
    max-width: 400px;
    border: 1px solid #ccc;
    padding: 10px;
    margin: 20px;
  }
  #preview-container img {
    max-width: 100%;
    height: auto;
  }
</style>

<div class="cursor-pointer hover:text-indigo-500 hover:font-medium" onclick="openPreviewModal({{ $index }})">
  {{ $slot }}
</div>

<div id="previewModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">
  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl font-medium">About {{ $module->name }}</p>
        <button onclick="closePreviewModal({{ $index }})" class="absolute right-8 ">
          <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4cursor-pointer active:mt-1">
        </button>
      </div>
      {{-- Slot  --}}
      <div class="px-8 pt-6 pb-4">
        <div class="space-y-4">
          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">What to do?</p>
            <p class="text-base">{{ $module->procedure }}</p>
          </div>

          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">How many sets and reps?</p>
            <p class="text-base">Do a {{ $module->sets }} sets where it has {{ $module->reps }} reps</p>
          </div>

          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">Be reminded that:</p>
            <p class="text-base">You should have a at lease a break about {{ $module->rest_period }} minute/s</p>
          </div>

          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">What its difficulty?</p>
            <p class="text-base">{{ $module->difficulty }}</p>
          </div>

          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">P.S?</p>
            <p class="text-base">{{ $module->notes }}</p>
          </div>

          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">You may follow this video link for reference</p>
            <div class="mt-6">
              <iframe width="450" height="315" src="https://www.youtube.com/embed/{{$module->video_url}}" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>

          
        </div>
      </div>
    </div>
  </div>
</div>

<script>
var iframe = document.getElementById("myIframe");

iframe.src = urlToEmbed;

function openPreviewModal(index){
  var previewModal = document.getElementById('previewModal_' + index);
  previewModal.style.display = 'block';
}

function closePreviewModal(index){
  var previewModal = document.getElementById('previewModal_' + index);
  previewModal.style.display = 'none';
}
</script>