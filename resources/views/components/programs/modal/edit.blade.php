<button onclick="openArchiveModal({{ $index }})" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
  <img src="/icons/programs/archive.svg" alt="" class="w-4 h-4">
</button>

<div id="archiveModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">

  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl font-medium">Restore Program</p>
        <button onclick="closeArchiveModal({{ $index }})" class="absolute right-8 ">
          <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4cursor-pointer active:mt-1">
        </button>
      </div>
      {{-- Slot  --}}
      <div class="px-8 pt-6 pb-4">
        <form method ="POST" action="/programs/archive/{{$active}}" enctype="multipart/form-data" >
          @csrf
          @method('PUT')
          <div class="space-y-8">
            <p class="text-sm"><span class="font-semibold">WARNING!</span> you are now archiving the program "sample". Please keep in note that this will affect all trainees that are currently enroleld.</p>
            <div class="space-y-2">
              <span class="text-md">type your <span class="font-semibold">"password"</span> in order to complete processing.</span>
              <input 
                id="inputText"
                name="password"
                type="password" 
                class="'bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md"
                autocomplete="off"
              />
            </div>
          </div>
          <input type="text" name="status" value="archive" class="invisible">
          <div class="flex items-center space-x-2 mt-6 relative">
            <div class="mr-auto"></div>
            <div class="flex items-center space-x-2">
              <button 
                type="submit"
                class="rounded-lg text-center px-6 py-3 text-sm text-white bg-red-500 cursor-pointer disabled:bg-red-400 disabled:cursor-not-allowed"
              >Archive</button>
          </div>
        </form>
      </div>
  
    </div>
  </div>
</div>

<script>
function openArchiveModal(index){
  var archiveModal = document.getElementById('archiveModal_' + index);
  archiveModal.style.display = 'block';
}

function closeArchiveModal(index){
  var archiveModal = document.getElementById('archiveModal_' + index);
  archiveModal.style.display = 'none';
}
</script>