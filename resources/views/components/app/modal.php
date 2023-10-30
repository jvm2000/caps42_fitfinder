<style>
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
</style>=
  
<button 
  id="openCreateProgram"
  type="submit"
  class="rounded-full flex items-center space-x-4 px-6 py-3 text-md text-white bg-black cursor-pointer w-36 absolute right-0 bottom-4 active:bottom-[15px]"
>
  <img src="/icons/programs/plus.svg" class="w-6 h-6">
  <p>{{ $button_desc }}</p>
</button>

<!-- The Modal -->
<div id="createProgramModal" class="modal">
  <!-- Modal content -->
  <div class="bg-white rounded-xl max-w-lg m-auto">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>
</div>

<script>
var modal = document.getElementById("createProgramModal");

var btn = document.getElementById("openCreateProgram");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>