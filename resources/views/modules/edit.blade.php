<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Modules
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Edit Module</p>
      <x-menu-dropdown />
    </div>

    <form method="POST" action="/modules/update/{{ $module->id }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mt-24 w-full grid place-items-center">
        <div class="max-w-4xl w-full">
          <div class="grid grid-cols-2 items-start w-full gap-x-8">
            <div class="flex flex-col space-y-2">
              <x-app.input 
                type="text" 
                label="Module Name" 
                placeholder="Enter Module Name" 
                name="name"
                value="{{$module->name}}"
              >
                <x-slot name="errors">
                  @error('name')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>
  
              <x-app.input 
                type="date" 
                label="Duration" 
                placeholder="DD/MM/YY" 
                name="duration"
                value="{{ $module->duration }}"
              >
                <x-slot name="errors">
                  @error('duration')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>
  
              <div class="space-y-2">
                <span class="text-md text-gray-600">Summary</span>
                <textarea 
                  type="text" 
                  class="bg-inherit text-sm px-8 py-4 w-full h-[120px] border-gray-500 border rounded-md" 
                  placeholder="Describe"
                  name="summary"
                 
                >{{$module->summary}}</textarea>
              </div>
            </div>
            
            <div class="flex flex-col space-y-2">
              <x-app.input 
                type="text" 
                label="Procedure" 
                placeholder="Attatch Link" 
                name="procedure"
                value="{{$module->procedure}}"
              >
                <x-slot name="errors">
                  @error('procedure')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>

              <div class="space-y-2">
                <span class="text-md text-gray-600">Set</span>
                <div class="grid grid-cols-3 items-center gap-x-4">
                  <input 
                    type="text" 
                    class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md col-span-2" 
                    placeholder="Enter Set Name"
                    name="set"
                    value="{{$module->set}}"
                  />
                  <input 
                    type="number" 
                    class="bg-inherit text-lg pl-5 pr-4 py-2 w-full border-gray-500 border rounded-md col-span-1" 
                    placeholder="#sets"
                    name="setcount"
                    value="{{$module->setcount}}"
                  />
                </div>
              </div>

              <div class="space-y-2">
                <span class="text-md text-gray-600">Reps</span>
                <div class="grid grid-cols-3 items-center gap-x-4">
                  <input 
                    type="text" 
                    class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md col-span-2" 
                    placeholder="Enter Reps Name"
                    name="rep"
                    value="{{$module->rep}}"
                  />
                  <input 
                    type="number" 
                    class="bg-inherit text-lg pl-5 pr-4 py-2 w-full border-gray-500 border rounded-md col-span-1" 
                    placeholder="#reps"
                    name="repcount"
                    value="{{$module->repcount}}"
                  />
                </div>
              </div>

              <x-app.custom-select label="Schedule Days">
                <x-slot name="data">
                  <p class="text-lg capitalize text-ellipsis overflow-hidden" id="selectedTags"><span class="text-gray-400">Select Days</span></p>
                </x-slot>
  
                @php
                    $options = [
                      0 => 'monday',
                      1 => 'tuesday',
                      2 => 'wednesday',
                      4 => 'thursday',
                      5 => 'friday',
                      6 => 'saturday',
                      7 => 'sunday',
                    ];
                @endphp
  
                @foreach ($options as $value)
                <label for="{{ $value }}" class="flex items-center space-x-2 indent-5 hover:bg-gray-200 py-1 cursor-pointer relative w-full pr-10">
                  <p class="text-lg text-black font-norma capitalize mr-auto">{{ $value }}</p>
                  <input id="{{ $value }}" name="" type="checkbox" class="w-4 h-4" value="{{ $value }}">
                </label>
                @endforeach
  
                <x-slot name="input">
                  <p class="text-lg" id="checkboxValue"></p>
                </x-slot>
              </x-app.custom-select>

              <input type="text" name="program_id" value="{{$program->id}}" class="hidden">
            </div>
          </div>

          <div class="mt-20 flex items-center relative mr-0">
            <div class="mr-auto"></div>
            <div class="flex items-center space-x-4">
              <a 
                href="/programs/show/{{$program->id}}"
                class="rounded-md flex items-center px-6 py-3 text-md text-black border-2 border-black cursor-pointer active:mt-[1px]"
              >
                Cancel
              </a>
              <button 
                type="submit"
                class="rounded-md flex items-center px-6 py-3 text-md text-white bg-black cursor-pointer active:mt-[1px]"
              >
                Update
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</x-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('input').click(function() {
      $('.error').hide();
  });
});

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