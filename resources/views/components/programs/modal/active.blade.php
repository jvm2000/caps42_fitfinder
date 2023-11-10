<style>
.activeModal {
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
.activeModal.active {
  opacity: 1;
  display: block;
  transition: opacity 0.3s ease-in-out, visibility 0s linear 0.3s;

}
</style>

<div id="openRestoreModal">
  {{-- Button placement  --}}
  <button class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
    <img src="/icons/programs/restore.svg" alt="" class="w-4 h-4">
  </button>
</div>

<!-- The Modal -->
<div id="restoreProgramModal" class="activeModal grid place-items-center w-screen h-screen z-[999]">
  <!-- Modal content -->
  <div class="max-w-lg w-full bg-white rounded-xl mx-auto mt-96">
    <div class="w-full relative flex items-center py-5 indent-6 border-b">
      <p class="text-xl font-medium">Archive Program</p>
      <img id="closeActive" src="/icons/programs/close.svg" alt="" class="w-4 h-4 absolute right-8 cursor-pointer active:mt-1">
    </div>
    {{-- Slot  --}}
    <div class="px-8 pt-6 pb-4">
      <form method ="POST" action="/programs/restore/{{$program}}">
        @csrf
        @method('PUT')
        <div class="space-y-8">
          <p class="text-sm">You are now restoring this program.</p>
        </div>
        <input type="text" name="status" value="active" class="invisible">
        <div class="flex items-center space-x-2 mt-6 relative">
          <div class="mr-auto"></div>
          <div class="flex items-center space-x-2">
            <div 
              id="cancelActive"
              class="rounded-lg text-center px-6 py-3 text-sm text-black border-2 cursor-pointer"
            >Cancel</div>
          </div>
          <button 
            type="submit"
            class="rounded-lg text-center px-6 py-3 text-sm text-white bg-green-500 cursor-pointer"
          >Restore</button>
        </div>
      </form>
    </div>

  </div>
</div>

<script>
var activeModal = document.getElementById("restoreProgramModal");

var restoreBtn = document.getElementById("openRestoreModal");

var closeBtn = document.getElementById("closeActive");

var cancelBtn = document.getElementById("cancelActive");

var success = document.getElementById("successfullyCreate");

var span = document.getElementsByClassName("close")[0];

restoreBtn.onclick = function() {
  activeModal.classList.add("active");
}

closeBtn.onclick = function() {
    activeModal.classList.remove("active");
}

cancelBtn.onclick = function() {
    activeModal.classList.remove("active");
}

success.onclick = function() {
  activeModal.classList.add("active");
}

window.onclick = function(event) {
  if (event.target == activeModal) {
    activeModal.classList.remove("active");
  }
}
</script>