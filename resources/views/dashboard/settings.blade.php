<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Settings
  </x-slot>
  
  <div class="w-full py-10 px-12 overflow-y-auto h-full max-h-[54rem]">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Settings</p>
      <x-menu-dropdown />
    </div>
    <div class="w-full border-b-8 mt-4"></div>
    <form method ="POST" action="/auth/profile/update/{{$user->id}}" enctype="multipart/form-data" >
      @csrf
      @method('PUT')
      <div class="grid grid-cols-5 gap-x-16 py-12 w-full px-12 items-start">
        {{-- Left Panel --}}
        <div class="flex flex-col space-y-6 col-span-3">
          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">Username<span class="text-red-500 font-light">*</span></label>
            <input 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              placeholder="Enter Username"
              disabled
              value="{{$user->username}}"
            >
          </div>
  
          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">First Name<span class="text-red-500 font-light">*</span></label>
            <input 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              placeholder="Enter First Name"
              name="first_name"
              value="{{$user->first_name}}"
            >
          </div>
  
          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">Last Name<span class="text-red-500 font-light">*</span></label>
            <input 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              placeholder="Enter Last Name"
              name="last_name"
              value="{{$user->last_name}}"
            >
          </div>

          
  
          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">Phone Number<span class="text-red-500 font-light">*</span></label>
            <input 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              placeholder="Enter Phone Number"
              minlength="11"
              maxlength="11"
              name="phone_number"
              value="{{$user->phone_number}}"
            >
          </div>
        </div>
        {{-- Right Panel  --}}
        <div class="space-y-4 col-span-1 pl-20 grid place-items-center">
          <div 
            id="uploadPhoto" 
            class="w-48 h-48 rounded-full border-2 hover:border-blue-950 active:mt-[1px] border-gray-300 relative grid place-items-center cursor-pointer"
          >
            <img 
              id="preview" width="100" height="100" 
              class="w-48 h-48 rounded-full absolute z-20 border-2 hover:border-blue-950 border-gray-300" 
              src="{{auth()->user()->getImageURL()}}"
            />
            <img src="/icons/settings/upload-icon.svg" alt="Upload Icon" class="w-8 h-8 z-10">
            <input 
              id="uploaded" 
              type="file" 
              name="image" 
              class="fixed z-40 h-8 w-8 invisible" 
              onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])"
              @error('image') is-invalid @enderror
            >
          </div>
          <p class="text-sm">Upload your image here.</p>
        </div>
      </div>
  
      <div class="mt-0 grid grid-cols-5 gap-x-16 px-12">
        <div class="flex flex-col space-y-6 col-span-3">
          <div class="grid grid-cols-3 items-center mt-6">
            <label class="text-base font-medium col-span-1 text-black">Address<span class="text-red-500 font-light">*</span></label>
            <input 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              placeholder="Enter Address"
              name="address"
              value="{{$user->address}}"
            >
          </div>

          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">City<span class="text-red-500 font-light">*</span></label>
            <input 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              placeholder="Enter City"
              name="city"
              value="{{$user->city}}"
            >
          </div>

          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">Province<span class="text-red-500 font-light">*</span></label>
            <input 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              placeholder="Enter Province"
              name="province"
              value="{{$user->province}}"
            >
          </div>

          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">Zip Code<span class="text-red-500 font-light">*</span></label>
            <input 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              placeholder="Enter Zip Code"
              name="zip_code"
              value="{{$user->zip_code}}"
            >
          </div>
        </div>
      </div>

      <div class="mt-20 grid grid-cols-5 gap-x-16 px-12">
        {{-- Main Panel  --}}
        <div class="flex flex-col space-y-6 col-span-3"> 
          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">Email</span></label>
            <input 
              type="email" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              disabled
              value="{{$user->email}}"
            >
          </div>

          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">Tags</span></label>
            <div class="flex flex-col relative col-span-2">
              <div id="dropdown-button" class="bg-inherit text-lg px-8 py-2 w-full flex items-center border-gray-500 border relative rounded-md cursor-default">
                <p class="text-lg capitalize text-ellipsis overflow-hidden" id="selectedTags"><span class="text-gray-400">Select Tags</span></p>
                <img src="/icons/chevron-icon.svg" alt="" class="absolute right-4 w-5 h-5">
              </div>
              <div class="space-y-1">
                <div
                  id="dropdown-menu"
                  class="mt-4 w-full absolute rounded-b-md border-t shadow-lg hidden  pt-0 pb-2 z-[9999] bg-white"
                >
                @php
                    $options = [
                      0 => 'karate',
                      1 => 'taekwando',
                      2 => 'boxing',
                      4 => 'muay thai',
                    ];
                @endphp

                @foreach ($options as $value)
                <label for="{{ $value }}" class="flex items-center space-x-2 indent-5 hover:bg-gray-200 py-1 cursor-pointer relative w-full pr-10">
                  <p class="text-lg text-black font-norma capitalize mr-auto">{{ $value }}</p>
                  <input id="{{ $value }}" name="tags[]" type="checkbox" class="w-4 h-4" value="{{ $value }}">
                </label>
                @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="mt-16 col-span-3 flex items-center relative">
          <div class="mr-auto"></div>
          <button 
            type="submit"
            class="rounded-md text-center px-6 py-3 text-md text-white bg-black cursor-pointer w-36"
          >Update</button>
        </div>
      </div>

    </form>
  </div>

  @if(session('message'))
    <x-app.toaster message="{{ session('message') }}">
    </x-app.toaster>
  @endif

</x-layout>

<script>
var success = document.getElementById("uploadPhoto");

success.onclick = function() {
  document.getElementById('uploaded')?.click()
}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('input').click(function() {
      $('.error').hide();
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const dropdownButton = document.getElementById('dropdown-button');
  const dropdownMenu = document.getElementById('dropdown-menu');

  dropdownButton.addEventListener('click', function () {
      dropdownMenu.classList.toggle('hidden');
  });

  // Close the dropdown when clicking outside of it
  document.addEventListener('click', function (event) {
    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
    }
  });
});

var array = []
var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

for (var i = 0; i < checkboxes.length; i++) {
  array.push(checkboxes[i].value)
}

var checkboxes = document.querySelectorAll('input[name="tags[]"]');

var selectedTagsParagraph = document.getElementById('selectedTags');

// Add change event listener to each checkbox
checkboxes.forEach(function(checkbox) {
  checkbox.addEventListener('change', function() {
    // Get all selected checkbox values
    var selectedTags = Array.from(document.querySelectorAll('input[name="tags[]"]:checked')).map(function(checkbox) {
        return checkbox.value;
    });

    // Update the paragraph element with selected tags
    selectedTagsParagraph.innerText = 'tags: ' + selectedTags.join(', ');
  });
});
</script>