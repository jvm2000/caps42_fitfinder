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
    <div id="Active" class="tabcontent w-full">
      @if($trainees->count() > 0)
      <table class="w-full table-auto border-spacing-y-6 border-separate">
        <thead>
          <tr>
            <th class="text-sm font-medium text-gray-400 py-4 text-left indent-16">Username</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Full Name</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Email</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Full Address</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Zip Code</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Status</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Joined at</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($trainees as $index => $active)
            @if($active->status === 'active')
            <tr class="">
              <td class="py-2 text-sm border-l-4 border-indigo-500 indent-6">
                @ {{ $active->username }}
              </td>
              <td class="py-2 text-sm">
                <div class="flex items-center space-x-4">
                  <div class="w-6 h-6 rounded-full">
                    <img src="{{$active->getImageURL()}}" alt="Profile" class="w-full h-full rounded-full">
                  </div>
                  <p class="text-sm text-black">{{ $active->first_name }} {{ $active->last_name }}</p>
                </div>
              </td>
              <td class="py-2 text-sm">
                <p class="text-sm text-black">{{ $active->email }}</p>
              </td>
              <td class="py-2 text-sm">
                @if($active->address)
                <div class="flex flex-col space-y-1">
                  <p class="text-sm text-black">{{ $active->address }}</p>
                  <p class="text-sm text-black">{{ $active->city }} {{ $active->province }}</p>
                </div>
                @else
                <p class="text-sm text-red-500">Address not filled up yet.</p>
                @endif
              </td>
              <td class="py-2 text-sm">
                @if($active->zip_code)
                <p class="text-sm text-black">{{ $active->zip_code }}</p>
                @else
                <p class="text-sm text-red-500">No zip code yet.</p>
                @endif
              </td>
              <td class="py-2 text-sm">
                <div class="flex items-center space-x-4">
                  <span
                    class="w-3 h-3 bg-green-500 rounded-full"
                  ></span>
                  <p>{{ $active->status }}</p>
                </div>
              </td>
              <td class="py-2 text-sm">
                {{ $active->created_at }}
              </td>
              <td class="py-2 text-sm">
                <x-admin.modal.suspend :active="$active" :index="$index"/>
              </td>
            </tr>
            @else
            <p>No trainees registered yet.</p>
            @endif
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
    <div id="Suspended" class="tabcontent">
      @if($trainees->count() > 0)
      <table class="w-full table-auto border-spacing-y-6 border-separate">
        <thead>
          <tr>
            <th class="text-sm font-medium text-gray-400 py-4 text-left indent-16">Username</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Full Name</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Email</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Full Address</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Zip Code</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Status</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Joined at</th>
            <th class="text-sm font-medium text-gray-400 py-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($trainees as $index => $suspended)
            @if($suspended->status === 'suspended')
            <tr class="">
              <td class="py-2 text-sm border-l-4 border-indigo-500 indent-6">
                @ {{ $suspended->username }}
              </td>
              <td class="py-2 text-sm">
                <div class="flex items-center space-x-4">
                  <div class="w-6 h-6 rounded-full">
                    <img src="{{$suspended->getImageURL()}}" alt="Profile" class="w-full h-full rounded-full">
                  </div>
                  <p class="text-sm text-black">{{ $suspended->first_name }} {{ $suspended->last_name }}</p>
                </div>
              </td>
              <td class="py-2 text-sm">
                <p class="text-sm text-black">{{ $suspended->email }}</p>
              </td>
              <td class="py-2 text-sm">
                @if($suspended->address)
                <div class="flex flex-col space-y-1">
                  <p class="text-sm text-black">{{ $suspended->address }}</p>
                  <p class="text-sm text-black">{{ $suspended->city }} {{ $suspended->province }}</p>
                </div>
                @else
                <p class="text-sm text-red-500">Address not filled up yet.</p>
                @endif
              </td>
              <td class="py-2 text-sm">
                @if($suspended->zip_code)
                <p class="text-sm text-black">{{ $suspended->zip_code }}</p>
                @else
                <p class="text-sm text-red-500">No zip code yet.</p>
                @endif
              </td>
              <td class="py-2 text-sm">
                <div class="flex items-center space-x-4">
                  <span
                    class="w-3 h-3 bg-red-500 rounded-full"
                  ></span>
                  <p>{{ $suspended->status }}</p>
                </div>
              </td>
              <td class="py-2 text-sm">
                {{ $suspended->created_at }}
              </td>
              <td class="py-2 text-sm">
                <div class="flex items-center space-x-3 relative">
                  <x-admin.modal.restore :suspended="$suspended" :index="$index"/>
                </div>
              </td>
            </tr>
            @else
            <p>No trainees registered yet.</p>
            @endif
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>


</x-admin-layout>