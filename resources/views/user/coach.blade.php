<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Profile
  </x-slot>

  <div class="w-full py-10 px-12 h-full max-h-[54rem] overflow-hidden">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Profile</p>
      <x-menu-dropdown />
    </div>

    <div class="py-7 flex items-center justify-between relative w-full border-b-8">
      <div class="flex items-center space-x-6">
        <div class="w-36 h-36 rounded-full relative">
          @if (auth()->user()->hasVerifiedEmail())
          <img src="/dashboard/icons/verified.svg" alt="Verified" class="w-10 h-10 inline absolute top-0 right-0" title="Verified">
          @else
          @endif
          <img src="{{auth()->user()->getImageURL()}}" alt="Profile" class="w-36 h-36 rounded-full">
        </div>

        <div class="space-y-1">
          <div class="flex items-center space-x-2">
            
            <p class="text-base font-medium">{{auth()->user()->username}}</p>
          </div>

          <p class="text-3xl font-semibold">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>

          <p class="text-2xl font-medium text-indigo-500">{{auth()->user()->role}}</p>
        </div>
      </div>

      <div class="grid grid-cols-4 items-center gap-y-5">
        <div class="col-span-3 items-center">
          <div class="flex items-center space-x-4">
            <div class="space-y-1">
              <p class="text-base font-semibold">Full Address:</p>
              <p class="text-base font-normal">{{auth()->user()->address}}, {{auth()->user()->city}}</p>
            </div>
          </div>
        </div>

        <div class="space-y-1 col-span-2 text-left">
          <p class="text-base font-semibold">Province</p>
          <p class="text-base font-normal">{{auth()->user()->province}}</p>
        </div>

        <div class="space-y-1 col-span-2">
          <p class="text-base font-semibold">Zip Code</p>
          <div class="flex items-center space-x-2">
            <p class="text-base font-normal">{{auth()->user()->zip_code}}</p>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-4 items-center gap-x-6 gap-y-5">
        <div class="space-y-1 col-span-1">
          <p class="text-base font-semibold">Gender:</p>
          <p class="text-base font-normal">{{auth()->user()->gender}}</p>
        </div>

        <div class="space-y-1 col-span-2 pl-2">
          <p class="text-base font-semibold">Phone Number:</p>
          <p class="text-base font-normal">{{auth()->user()->phone_number}}</p>
        </div>

        <div class="space-y-1 col-span-1 text-center">
          <p class="text-base font-semibold">Age</p>
          <p class="text-base font-normal">{{auth()->user()->getAgeAttribute()}}</p>
        </div>

        <div class="space-y-1 col-span-4">
          <p class="text-base font-semibold">Interests</p>
          <div class="flex items-center space-x-2">
            @foreach(auth()->user()->tags as $tag)
              <p class="text-base font-normal capitalize">{{ $tag }},</p>
            @endforeach
          </div>
        </div>
      </div>

    </div>

    {{-- Coach Side  --}}
    @if ($portfolio->count() > 0 && auth()->user()->role === 'Coach') 
    <x-portfolio.edit />
    @elseif (auth()->user()->role === 'Coach')
    <form method="POST" action="/portfolio/create/{{auth()->user()->id}}" enctype="multipart/form-data">
      @csrf
      <div class="mt-8 w-full grid place-items-center">
        <div class="grid grid-cols-2 items-start gap-x-8">
          <div class="flex flex-col">
            <div class="flex items-center space-x-5">
              <p class="text-2xl font-semibold">Manage Porfolio</p>
              <button>
                <img src="/icons/portfolio/edit-icon.svg" alt="Edit Icon" class="w-5 h-5">
              </button>
            </div>

            <div class="mt-10 flex flex-col space-y-5">
              <div class="space-y-2">
                <span class="text-md text-gray-600 font-semibold">Description</span>
                <textarea 
                  type="text" 
                  class="bg-inherit text-base px-8 py-2 h-32 w-full border-gray-500 border rounded-md resize-none" 
                  placeholder="Description..."
                  name="description"
                ></textarea>
                @error('description')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </div>

              <div class="space-y-2">
                <span class="text-md text-gray-600 font-semibold">Recent Works</span>
                <input 
                  type="text" 
                  class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border rounded-md" 
                  placeholder="State your recent works"
                  name="recent_works"
                />
                @error('recent_works')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </div>

              <div class="space-y-2">
                <span class="text-md text-gray-600 font-semibold">What are some of your hobbies?</span>
                <input 
                  type="text" 
                  class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border rounded-md" 
                  placeholder="State your hobbies"
                  name="hobbies"
                />
                @error('hobbies')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </div>
            </div>
          </div>

          <div class="flex flex-col items-start">
            <div class="flex items-center space-x-5">
              <p class="text-2xl font-semibold">Upload Resume / Application Form</p>
              <button>
                <img src="/icons/portfolio/upload-icon.svg" alt="Upload Icon" class="w-5 h-5">
              </button>
            </div>
            <div class="mt-10 flex items-center space-x-8">
              <div 
                id="uploadFile" 
                class="w-64 h-[350px] border grid place-items-center cursor-pointer hover:border-2 hover:border-black group"
                title="Upload File"
              >
                <img 
                  id="preview" width="100" height="100" 
                  class="w-full h-full z-40"
                />
                <img src="/icons/general/upload-icon.svg" alt="" class="w-10 h-10 group-hover:w-11 group-hover:h-11 fixed z-20">
                <input 
                  type="file" 
                  class="fixed z-40 h-8 w-8 invisible" 
                  name="form_document" 
                  id="uploaded"
                  onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])"
                >
              </div>
            </div>
          </div>

          <div class="col-span-2 w-full flex items-center relative mt-8">
            <div class="mr-auto"></div>
            <button 
              type="submit"
              class="rounded-md text-center px-6 py-3 text-md text-white bg-black cursor-pointer"
            >Upload</button>
          </div>

        </div>
      </div>

    </form>
    @endif

  </div>
</x-layout>

<script>
var success = document.getElementById("uploadFile");

success.onclick = function() {
  document.getElementById('uploaded')?.click()
}

$(document).ready(function() {
  $('input').click(function() {
      $('.error').hide();
  });
});
</script>
