<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Programs
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Edit Program</p>
      <x-menu-dropdown />
    </div>

    <form method="POST" action="/programs/update/{{$program->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mt-24 w-full grid place-items-center">
        <div class="max-w-4xl w-full">
          <div class="grid grid-cols-2 items-start w-full">
            <div class="flex flex-col space-y-6">
              <div class="space-y-2 w-full">
                <span class="text-md text-gray-600">Name</span>
                <input 
                  type="text" 
                  class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md" 
                  placeholder="Enter Program's name"
                  name="name"
                  value="{{$program->name}}"
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
                >
                {{$program->summary}}
              </textarea>
                @error('summary')
                <p class="text-red-500 text-sm">{{$message}}</p>
                @enderror
              </div>
            </div>

            <div class="space-y-4 col-span-1 pl-20 grid place-items-center">
              <div 
                id="uploadPhoto" 
                class="w-48 h-48 rounded-full border-2 hover:border-blue-950 active:mt-[1px] border-gray-300 relative grid place-items-center cursor-pointer"
              >
                <img 
                  id="preview" width="100" height="100" 
                  class="w-48 h-48 rounded-full absolute z-20" 
                  src="{{ $program->getImageURL() }}"
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
                Update
              </button>
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

</script>