<button onclick="openDeactivateModal()" class="appearance-none text-sm text-red-500">
  Deactivate
</button>

<div id="deactivateModal" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">

  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl font-medium">Deactivate Account</p>
        <button onclick="closeDeactivateModal()" class="absolute right-8 ">
          <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4cursor-pointer active:mt-1">
        </button>
      </div>
      {{-- Slot  --}}
      <form method="POST" action="/auth/deactive/{{auth()->user()->id}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="px-8 pt-6 pb-4">
          <div class="space-y-8">
            <p class="text-sm"><span class="font-semibold text-red-500">WARNING!</span> you are now deactiving your account. Please keep in note that you can still reactivate it back that's within the system.</p>

            <div class="space-y-2">
              <span class="text-sm">type your <span class="font-semibold">"password"</span> in order to complete processing.</span>
              <input 
                id="inputText"
                name="password"
                type="password" 
                class="'bg-inherit text-md px-8 py-2 w-full border-gray-500 border rounded-md"
                autocomplete="off"
              />
            </div>

            <div class="flex items-center space-x-2 relative w-full">
              <div class="mr-auto"></div>
              <div class="flex items-center space-x-2">
                <button 
                  type="submit"
                  class="rounded-lg text-center px-6 py-3 text-sm text-white bg-red-500 cursor-pointer disabled:bg-red-400 disabled:cursor-not-allowed"
                >Deactivate</button>
              </div>
            </div>
        </div>
        <input type="text" name="status" value="deactivated" class="invisible h-1">
      </form>
    </div>
  </div>
</div>

<script>
function openDeactivateModal(){
  var deactivateModal = document.getElementById('deactivateModal');
  deactivateModal.style.display = 'block';
}

function closeDeactivateModal(){
  var deactivateModal = document.getElementById('deactivateModal');
  deactivateModal.style.display = 'none';
}
</script>