<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Modules
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Create Module</p>
      <x-menu-dropdown />
    </div>

    <form method="POST" action="/modules/create/{{$program->id}}">
      @csrf
      <div class="mt-24 w-full grid place-items-center">
        <div class="max-w-4xl w-full">
          <div class="grid grid-cols-2 items-start w-full gap-x-8">
            <div class="flex flex-col space-y-2">
              <x-app.input 
                type="text" 
                label="Module Name" 
                placeholder="Enter Module Name" 
                name="name"
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
                  class="bg-inherit text-sm px-8 py-4 w-full h-[120px] border-gray-500 border rounded-md" 
                  placeholder="What to do?"
                  name="procedure"
                ></textarea>
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
                  />
                  <input 
                    type="number" 
                    class="bg-inherit text-lg pl-8 pr-4 py-2 w-full border-gray-500 border rounded-md" 
                    placeholder="Enter Reps"
                    name="reps"
                  />
                </div>
              </div>

              <x-app.input 
                type="number" 
                label="Rest Period (minute/s)" 
                placeholder="Enter Required Rest Period" 
                name="rest_period"
              >
                <x-slot name="errors">
                  @error('rest_period')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>

              <div class="space-y-2">
                <span class="text-md text-gray-600">Difficulty</span>
                <select 
                  name="difficulty" 
                  class="bg-inherit text-lg pl-8 py-2 w-full border-gray-500 border rounded-md" 
                >
                  <option value="" selected disabled>Select Difficulty</option>
                  <option value="beginner">Beginner</option>
                  <option value="intermediate">Intermediate</option>
                  <option value="expert">Expert</option>
                </select>
              </div>

              <x-app.input 
                type="text" 
                label="Notes" 
                placeholder="What to note..." 
                name="notes"
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
                href="/programs/show/{{ $program->id }}"
                class="rounded-md flex items-center px-6 py-3 text-md text-black border-2 border-black cursor-pointer active:mt-[1px]"
              >
                Cancel
              </a>
              <button 
                type="submit"
                class="rounded-md flex items-center px-6 py-3 text-md text-white bg-black cursor-pointer active:mt-[1px]"
              >
                Create
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

var checkboxes = document.querySelectorAll('input[name="schedule[]"]');

var selectedDaysParagraph = document.getElementById('selectedDays');

// Add change event listener to each checkbox
checkboxes.forEach(function(checkbox) {
  checkbox.addEventListener('change', function() {
    // Get all selected checkbox values
    var selectedDays = Array.from(document.querySelectorAll('input[name="schedule[]"]:checked')).map(function(checkbox) {
        return checkbox.value;
    });

    // Update the paragraph element with selected tags
    selectedDaysParagraph.innerText = 'days: ' + selectedDays.join(', ');
  });
});
</script>
