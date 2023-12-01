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
                value="{{ $module->name }}"
              >
                <x-slot name="errors">
                  @error('name')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>
  
              <x-app.input 
                type="text" 
                label="Video Reference" 
                placeholder="Enter Youtube's URL" 
                name="video_url"
                value="{{ $module->video_url }}"
                class="text-blue-500"
              >
                <x-slot name="errors">
                  @error('video_url')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>
  
              <div class="space-y-2">
                <span class="text-md text-gray-600">Procedure</span>
                <textarea 
                  type="text" 
                  class="bg-inherit text-lg px-8 py-4 w-full h-[120px] border-gray-500 border rounded-md" 
                  placeholder="What to do?"
                  name="procedure"
                >{{ $module->procedure }}</textarea>
              </div>
            </div>
            
            <div class="flex flex-col space-y-2">
              <div class="space-y-2">
                <span class="text-md text-gray-600">Set</span>
                <div class="grid grid-cols-2 items-center gap-x-4">
                  <input 
                    type="number" 
                    class="bg-inherit text-lg pl-8 pr-4 py-2 w-full border-gray-500 border rounded-md" 
                    placeholder="Enter Sets"
                    name="sets"
                    value="{{ $module->sets }}"
                  />
                  <input 
                    type="number" 
                    class="bg-inherit text-lg pl-8 pr-4 py-2 w-full border-gray-500 border rounded-md" 
                    placeholder="Enter Reps"
                    name="reps"
                    value="{{ $module->reps }}"
                  />
                </div>
              </div>

              <x-app.input 
                type="number" 
                label="Rest Period (minute/s)" 
                placeholder="Enter Required Rest Period" 
                name="rest_period"
                value="{{ $module->rest_period }}"
              >
                <x-slot name="errors">
                  @error('rest_period')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>
              @php
                $options = [
                  0 => 'beginner',
                  1 => 'intermediate',
                  2 => 'expert',
                ];
                @endphp
              <div class="space-y-2">
                <span class="text-md text-gray-600">Difficulty</span>
                <select 
                  name="difficulty" 
                  class="bg-inherit text-lg pl-8 py-2 w-full border-gray-500 border rounded-md capitalize" 
                >
                  <option value="" selected disabled>Select Difficulty</option>
                  @foreach($options as $option)
                  <option 
                    value="{{ $option }}" 
                    class="capitalize"
                    @if($module->difficulty === $option)
                    selected
                    @endif
                  >{{ $option }}</option>
                  @endforeach
                </select>
              </div>

              <x-app.input 
                type="text" 
                label="Notes" 
                placeholder="What to note..." 
                name="notes"
                value="{{ $module->notes }}"
              >
                <x-slot name="errors">
                  @error('notes')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>

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
      <input type="text" name="program_id" value="{{$program->id}}" class="hidden">
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
