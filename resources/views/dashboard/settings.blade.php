<script>
</script>

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
    <form enctype="multipart/form-data" method ="POST" action="/auth/profile/update/{{$user->id}}">
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
  
          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">Birthdate<span class="text-red-500 font-light">*</span></label>
            <input 
              type="date" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              placeholder="MM/DD/YY"
              name="birthdate"
            >
          </div>
  
          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">Gender<span class="text-red-500 font-light">*</span></label>
            <select 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2 appearance-none" 
              name="gender"
              value="{{$user->gender}}"
            >
              <option value="" selected disabled>Enter Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>

          <div class="flex flex-col space-y-6 col-span-3">
            <div class="grid grid-cols-3 items-center">
              <label class="text-base font-medium col-span-1 text-black">Tags</span></label>
              <input 
                type="text" 
                class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
                placeholder="Enter Tags"
                name="tags"
                value="{{$user->tags}}"
              >
            </div>
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
              class="w-48 h-48 rounded-full absolute z-20" 
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
      {{-- Navigation Panel  --}}
      <div class="mt-6 grid grid-cols-5 gap-x-16 px-12">
        {{-- Main Panel  --}}
        <div class="flex flex-col space-y-6 col-span-3">
          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-black">Tags</span></label>
            <input 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
              placeholder="Enter Tags"
              name="tags"
              value="{{$user->tags}}"
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
            <label class="text-base font-medium col-span-1 text-black">Verification code</span></label>
            <input 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            >
          </div>
        </div>
  
      </div>
      <div class="pt-16 w-full max-w-2xl flex items-center relative pl-11 pr-10">
        <div class="mr-auto"></div>
        <button 
          type="submit"
          class="rounded-md text-center px-6 py-3 text-md text-white bg-black cursor-pointer w-36"
        >Update</button>
      </div>

    </form>
  </div>

  @if(session('message'))
  <div class="fixed bottom-20 right-20">
    <div class="py-4 px-6 bg-white shadow-lg border-l-4 border-green-500">sss</div>
  </div>
  @endif

</x-layout>

<script>
var success = document.getElementById("uploadPhoto");

success.onclick = function() {
  document.getElementById('uploaded')?.click()
}
</script>