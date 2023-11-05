<style>
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999; /* Sit on top */
  left: 0;
  top: 0;
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
</style>

@props(['name'])

<div id="openCreateModal">
  {{ $button }}
</div>

<!-- The Modal -->
<div id="createProgramModal" class="modal grid place-items-center w-screen h-screen">
  <!-- Modal content -->
  <div {{ $attributes->class(['w-full bg-white m-auto rounded-xl']) }}>
    <div class="w-full relative flex items-center py-5 indent-6 border-b">
      <p class="text-xl font-medium">{{ $name }}</p>
      <img id="close" src="/icons/programs/close.svg" alt="" class="w-4 h-4 absolute right-8 cursor-pointer active:mt-1">
    </div>
    <div class="px-8 py-6">
      {{ $slot }}
    </div>

  </div>
</div>

<script>
var modal = document.getElementById("createProgramModal");

var btn = document.getElementById("openCreateModal");

var closeBtn = document.getElementById("close");

var cancelBtn = document.getElementById("cancel");

var success = document.getElementById("successfullyCreate");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

closeBtn.onclick = function() {
  modal.style.display = "none";
}

cancelBtn.onclick = function() {
  modal.style.display = "none";
}

success.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>