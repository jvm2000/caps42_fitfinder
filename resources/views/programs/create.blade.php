<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Programs
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Create Program</p>
      <x-menu-dropdown />
    </div>

    <form method="POST" action="/programs/create/{{auth()->user()->id}}" enctype="multipart/form-data">
      @csrf
      <div class="mt-24 w-full grid place-items-center">
        <div class="max-w-4xl w-full">
          <div class="grid grid-cols-2 items-start w-full">
            <div class="flex flex-col space-y-6">
              <div class="flex flex-col space-y-3">
                <div class="space-y-2 w-full">
                  <span class="text-md text-gray-600">Name</span>
                  <input 
                    type="text" 
                    class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md" 
                    placeholder="Enter Program's name"
                    name="name"
                  >
                  @error('name')
                  <p class="text-red-500 text-sm">{{$message}}</p>
                  @enderror
                </div>
          
                <div class="space-y-2 w-full">
                  <span class="text-md text-gray-600">Category</span>
                  <select 
                    class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" 
                    name="category"
                  >
                    <option value="" disabled selected>Select Category</option>
                    <option value="Taekwando">Taekwando</option>
                    <option value="Karate">Karate</option>
                    <option value="Muay Thai">Muay Thai</option>
                    <option value="Punching">Punching</option>
                    <option value="Punching">Strength Training</option>
                    <option value="Punching">Weight Training</option>
                    <option value="Punching">Pilates</option>
                    <option value="Punching">Body building</option>
                  </select> 
                  @error('category')
                  <p class="text-red-500 text-sm">{{$message}}</p>
                  @enderror
                </div>
      
                <div class="space-y-2">
                  <span class="text-md text-gray-600">Summary</span>
                  <textarea 
                    type="text" 
                    class="bg-inherit text-sm px-8 py-4 w-full h-40 border-gray-500 border rounded-md" 
                    placeholder="Describe"
                    name="summary"
                  ></textarea>
                  @error('summary')
                  <p class="text-red-500 text-sm">{{$message}}</p>
                  @enderror
                </div>

                <div class="flex items-center space-x-4">
                  <input 
                    type="checkbox" name="is_prerequisite" 
                    class="w-4 h-4" id="limit_checkbox"
                    onclick="isLimitProgramChecked()"
                  >
                  <label for="limit_checkbox" class="texzt-lg text-neutral-900 cursor-default">Is there a limit on the number of students?</label>                
                </div>

                <div id="limitProgramContainer" class="space-y-2 hidden">
                  <span class="text-md text-gray-600">Number of trainees</span>
                  <input 
                    type="number" 
                    class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md" 
                    placeholder="Enter number of trainees or null for no limit"
                    name="no_of_trainees"
                  >
                  @error('no_of_trainees')
                  <p class="text-red-500 text-sm">{{$message}}</p>
                  @enderror
                </div>
              </div>

              @if(auth()->user()->programs->count() > 0)
              <div class="flex items-center space-x-4">
                <input 
                  type="checkbox" name="is_prerequisite" 
                  class="w-4 h-4" id="prerequisite_checkbox"
                  onclick="isPreRequesiteChecked()"
                >
                <label for="prerequisite_checkbox" class="texzt-lg text-neutral-900 cursor-default">Does this program has a prerequisite?</label>                
              </div>

              <select id="prerequisiteContainer" name="prerequisite_program_id" class="bg-inherit hidden text-sm px-8 py-2 w-full border-gray-500 border rounded-md">
                <option value="" disabled selected>Select Program</option>
                @foreach($programs as $index => $program)
                  <option value="{{ $program->id }}">{{ $program->name }}</option>
                @endforeach
              </select>
              @endif
            </div>
    
            {{-- Upload Image  --}}
            <div class="space-y-4 col-span-1 mt-6 pl-20 grid place-items-center">
              <div 
                id="uploadPhoto" 
                class="w-48 h-48 rounded-full border-2 hover:border-blue-950 active:mt-[1px] border-gray-300 relative grid place-items-center cursor-pointer"
              >
                <img 
                  id="preview" width="100" height="100" 
                  class="w-48 h-48 rounded-full absolute z-20" 
                  src=""
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
  
          <div class="absolute bottom-24 right-24">
            <div class="mt-20 flex items-center relative mr-12">
              <div class="mr-auto"></div>
              <div class="flex items-center space-x-4">
                <a 
                  href="/programs/list"
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
      </div>
    </form>

  </div>
</x-layout>

<script>
var success = document.getElementById("uploadPhoto");

success.onclick = function() {
  document.getElementById('uploaded')?.click()
}

var limit_checkbox = document.getElementById('limit_checkbox');

function isLimitProgramChecked(){
  var limitProgram = document.getElementById('limitProgramContainer');
  limitProgram.style.display = limit_checkbox.checked ? 'block' : 'none';
}

var prerequisite_checkbox = document.getElementById('prerequisite_checkbox');

function isPreRequesiteChecked(){
  var prerequisitePrograms = document.getElementById('prerequisiteContainer');
  prerequisitePrograms.style.display = prerequisite_checkbox.checked ? 'block' : 'none';
}

var radios = document.querySelectorAll('input[name="prerequisite_program_id"]');

var selectedRadios = document.getElementById('selectedRadio');

radios.forEach(function(radio) {
  radio.addEventListener('change', function() {

    var selectedRadio = Array.from(document.querySelectorAll('input[name="prerequisite_program_id"]:checked')).map(function(radio) {
        return radio.value;
    });

    selectedRadios.innerText = 'Program ' + selectedRadio.join(', ');
  });
});
</script>