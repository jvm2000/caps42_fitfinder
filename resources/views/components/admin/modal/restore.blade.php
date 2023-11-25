<button onclick="openRestoreModal({{ $index }})" class="w-7 h-7 rounded-full p-1.5 bg-green-500">
  <img src="/icons/programs/restore.svg" alt="" class="w-4 h-4">
</button>

<button onclick="openDeleteModal({{ $index }})" class="w-7 h-7 rounded-full p-1.5 bg-red-500">
  <img src="/icons/programs/delete.svg" alt="" class="w-4 h-4">
</button>

<div>
  <div id="restoreModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">
    <div class="flex items-center justify-center h-full">
      <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
        <div class="w-full relative flex items-center py-5 indent-6 border-b">
          <p class="text-xl font-medium">Restore Account</p>
          <button onclick="closeRestoreModal({{ $index }})" class="absolute right-8 ">
            <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4cursor-pointer active:mt-1">
          </button>
        </div>
        {{-- Slot  --}}
        <div class="px-8 pt-6 pb-4">
          <form method="POST" action="/admin/suspend/{{$suspended->id}}" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="space-y-8">
              <p class="text-sm"><span class="font-semibold">NOTE:</span> you are now restoring <span class="font-semibold">{{ $suspended->first_name }} {{ $suspended->last_name }}</span>'s account.</p>
            </div>
            <input type="text" name="status" value="active" class="invisible">
            <div class="flex items-center space-x-2 mt-6 relative">
              <div class="mr-auto"></div>
              <div class="flex items-center space-x-2">
                <button 
                  type="submit"
                  class="rounded-lg text-center px-6 py-3 text-sm text-white bg-green-500 cursor-pointer disabled:bg-red-400 disabled:cursor-not-allowed"
                >Restore</button>
            </div>
          </form>
        </div>
    
      </div>
    </div>
  </div>
</div>

<div>
  <div id="deleteModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">
    <div class="flex items-center justify-center h-full">
      <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
        <div class="w-full relative flex items-center py-5 indent-6 border-b">
          <p class="text-xl font-medium">Delete Account</p>
          <button onclick="closeDeleteModal({{ $index }})" class="absolute right-8 ">
            <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4cursor-pointer active:mt-1">
          </button>
        </div>
        {{-- Slot  --}}
        <div class="px-8 pt-6 pb-4">
          <form method="POST" action="/admin/delete/{{$suspended->id}}" enctype="multipart/form-data" >
            @csrf
            @method('delete')
            <div class="space-y-8">
              <p class="text-sm"><span class="font-semibold">WARNING!</span> you are now deleting <span class="font-semibold">{{ $suspended->first_name }} {{ $suspended->last_name }}</span>'s account. Please keep in note that the account will be permanently deleted within the system.</p>
            </div>
            <div class="flex items-center space-x-2 mt-6 relative">
              <div class="mr-auto"></div>
              <div class="flex items-center space-x-2">
                <button 
                  type="submit"
                  class="rounded-lg text-center px-6 py-3 text-sm text-white bg-red-500 cursor-pointer disabled:bg-red-400 disabled:cursor-not-allowed"
                >Delete</button>
            </div>
          </form>
        </div>
    
      </div>
    </div>
  </div>
</div>

<script>
function openRestoreModal(index){
  var restoreModal = document.getElementById('restoreModal_' + index);
  if (restoreModal) {
    restoreModal.style.display = 'block';
  }
}

function closeRestoreModal(index){
  var restoreModal = document.getElementById('restoreModal_' + index);
  if (restoreModal) {
    restoreModal.style.display = 'none';
  }
}
  
function openDeleteModal(index){
  var deleteModal = document.getElementById('deleteModal_' + index);
  if (deleteModal) {
    deleteModal.style.display = 'block';
  }
}

function closeDeleteModal(index){
  var deleteModal = document.getElementById('deleteModal_' + index);
  if (deleteModal) {
    deleteModal.style.display = 'none';
  }
}
</script>