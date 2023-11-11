<button onclick="openDeleteModal({{ $index }})" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
  <img src="/icons/programs/delete.svg" alt="" class="w-4 h-4">
</button>

<div id="deleteModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">

  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl font-medium">Delete Program</p>
        <button onclick="closeDeleteModal({{ $index }})" class="absolute right-8 ">
          <img src="/icons/programs/close.svg" alt="" class="w-4 h-4 cursor-pointer active:mt-1">
        </button>
      </div>

      <div class="px-8 pt-6 pb-4">
        <form method ="POST" action="" >
          @csrf
          <div class="space-y-8">
            <p class="text-sm"><span class="font-semibold">WARNING!</span> you are now deleting the program "sample". Please keep in note that this will affect all trainees that are currently enroleld.</p>
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
              >Delete</button>
          </div>
        </form>
      </div>
  
    </div>
  </div>
</div>

<script>
function openDeleteModal(index){
  var deleteModal = document.getElementById('deleteModal_' + index);
  if (deleteModal) {
    deleteModal.style.display = 'block';
  }
}

function closeDeleteModal(index){
  var deleteModal = document.getElementById('deleteModal_' + index);
  if (deleteModal) {
    deleteModal.style.display = 'block';
  }
  deleteModal.style.display = 'none';
}
</script>