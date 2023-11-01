{{-- Modal  --}}
<x-app.modal class="max-w-2xl mt-40" name="Create Program">
  <x-slot name="button">
    <button 
      type="submit"
      class="rounded-full flex opa items-center space-x-4 px-6 py-3 text-md text-white bg-black cursor-pointer w-auto absolute right-0 bottom-4 active:bottom-[15px]"
    >
      <img src="/icons/programs/plus.svg" class="w-6 h-6">
      <p class="whitespace-nowrap">Create</p>
    </button>
  </x-slot>

  <form method="POST" action="/programs/create/{{auth()->user()->id}}">
    @csrf
    <div class="grid grid-cols-4 items-center gap-x-16">

      <div class="space-y-4 grid place-items-center col-span-1">
        <div 
          id="uploadPhoto" 
          class="w-[148px] h-[148px] rounded-md border-2 border-gray-300 relative grid place-items-center cursor-pointer"
        >
          <img src="/icons/settings/upload-icon.svg" alt="Upload Icon" class="w-6 h-6">
          <input id="uploaded" type="file" name="image" class="fixed z-40 h-8 w-8 invisible" @error('image') is-invalid @enderror>
        </div>
      </div>
  
      <div class="space-y-2 col-span-3">
        <div class="space-y-2 w-full">
          <span class="text-md text-gray-600">Name</span>
          <input 
            type="text" 
            class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md" 
            placeholder="Enter Program's name"
            name="name"
          >
          @error('last_name')
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
        </div>
  
      </div>
    </div>
  
    <div class="space-y-2">
      <span class="text-md text-gray-600">Summary</span>
      <textarea 
        type="text" 
        class="bg-inherit text-sm px-8 py-4 w-full h-40 border-gray-500 border rounded-md" 
        placeholder="Describe"
        name="summary"
      ></textarea>
    </div>
    <x-slot name="store">
      <div 
        type="submit"
        class="rounded-lg text-center px-6 py-3 text-md text-white bg-black cursor-pointer"
      >Create</div>
    </x-slot>
  </form>
</x-app.modal>

<script>
  var success = document.getElementById("uploadPhoto");

  success.onclick = function() {
    document.getElementById('uploaded')?.click()
  }
</script>