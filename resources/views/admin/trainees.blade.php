<style>
.tab button {
  background-color: inherit;
}

.tab button.active {
  border-color: #6366F1; 
  color: #6366F1; 
}
</style>

<script>
  window.onload = function() {
  // Find the element by its ID
  var button = document.getElementById('myButton');

  // Check if the element exists
  if (button) {
      // Programmatically trigger the click event
      button.click();
  }
};

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

<x-admin-layout header="Trainees">
  {{-- Title  --}}
  <x-slot:title>
    Admin - Trainees
  </x-slot>

  <div class="flex items-center relative h-14">
    <div class="flex items-center mr-auto z-20 tab">
      <button 
        id="myButton"
        class="relative px-6 group border-b-4 py-[14px] cursor-pointer hover:border-indigo-400 tablinks" onclick="openTab(event, 'Active')"
      >
        <p class="text-base font-semibold group-hover:text-indigo-400">Active</p>
      </button>

      <button
        class="relative px-6 justify-center border-b-4 group py-[14px] cursor-pointer hover:border-indigo-400 tablinks" 
        onclick="openTab(event, 'Suspended')"
      >
        <p class="text-base font-medium group-hover:text-indigo-400">Suspended</p>
      </button>
    </div>

    <div class="w-full border-t-4 absolute z-10 bottom-0"></div>
  </div>

  <div class="mt-2">
    <div id="Active" class="tabcontent">
      @foreach($trainees as $index => $active)
      <p>{{$active->username}}</p>
      @endforeach
    </div>
    <div id="Suspended" class="tabcontent">
      Suspended
    </div>
  </div>


</x-admin-layout>