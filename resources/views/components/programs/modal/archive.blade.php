<style>
  .archiveModal {
    opacity: 0;
    display: none;
    transition: opacity 0.3s ease-in-out, display 0s linear 0.3s;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  .archiveModal.active {
    opacity: 1;
    display: block;
    transition: opacity 0.3s ease-in-out, visibility 0s linear 0.3s;
  
  }
  </style>
  
  {{-- Button placement  --}}
  <button id="openArchiveModal" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
    <img src="/icons/programs/archive.svg" alt="" class="w-4 h-4">
  </button>
  
  <!-- The Modal -->
  <div id="archiveProgramModal" class="archiveModal grid place-items-center w-screen h-screen">
    <!-- Modal content -->
    <div class="w-full max-w-lg bg-white mx-auto mt-64 rounded-xl">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl font-medium">Restore Program</p>
        <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4 absolute right-8 cursor-pointer active:mt-1">
      </div>
      {{-- Slot  --}}
      <div class="px-8 pt-6 pb-4">
        <form method ="POST" action="/programs/archive/{{$program}}">
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
              <div 
                id="cancelArchive"
                class="rounded-lg text-center px-6 py-3 text-sm text-black border-2 cursor-pointer"
              >Cancel</div>
            </div>
            <button 
              id="submitButton"
              type="submit"
              disabled
              class="rounded-lg text-center px-6 py-3 text-sm text-white bg-red-500 cursor-pointer disabled:bg-red-400 disabled:cursor-not-allowed"
            >Archive</button>
          </div>
        </form>
      </div>
  
    </div>
  </div>
  
  <script>
  var archiveModal = document.getElementById("archiveProgramModal");
  
  var btn = document.getElementById("openArchiveModal");
  
  var closeBtn = document.getElementById("closeArchive");
  
  var cancelBtn = document.getElementById("cancelArchive");
  
  var success = document.getElementById("successfullyCreate");
  
  var span = document.getElementsByClassName("closeArchive")[0];
  
  btn.onclick = function() {
    archiveModal.classList.add("active");
  }
  
  closeBtn.onclick = function() {
      archiveModal.classList.remove("active");
  }
  
  cancelBtn.onclick = function() {
      archiveModal.classList.remove("active");
  }
  
  success.onclick = function() {
    archiveModal.classList.add("active");
  }
  
  window.onclick = function(event) {
    if (event.target == archiveModal) {
      archiveModal.classList.remove("active");
    }
  }
  </script>

{{-- <x-app.modal name="Archive Modal" class="max-w-lg mt-64">
  <x-slot name="button">
    <button class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
      <img src="/icons/programs/archive.svg" alt="" class="w-4 h-4">
    </button>
  </x-slot>

  <form method ="POST" action="/programs/archive/{{$program}}">
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
        <div 
          id="cancel"
          class="rounded-lg text-center px-6 py-3 text-sm text-black border-2 cursor-pointer"
        >Cancel</div>
      </div>
      <button 
        id="submitButton"
        type="submit"
        disabled
        class="rounded-lg text-center px-6 py-3 text-sm text-white bg-red-500 cursor-pointer disabled:bg-red-400 disabled:cursor-not-allowed"
      >Archive</button>
      <input type="hidden" name="password" id="password" value="{{ auth()->user()->password }}">
    </div>
  </form>
</x-app.modal> --}}

<script>
const inputText = document.getElementById('inputText');
const submitButton = document.getElementById('submitButton');

inputText.addEventListener('input', function() {
    submitButton.disabled = inputText.value.trim() === '';
});
</script>