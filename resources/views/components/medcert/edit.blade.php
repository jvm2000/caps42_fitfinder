<style>
  .container {
    display: none; /* Hidden by default */
  }
  .display {
    display: block; /* Hidden by default */
  }
  </style>
  
  <div class="mt-8 w-full grid place-items-center display" id="displayForm">
    <div class="grid grid-cols-2 items-start gap-x-8">
      <div class="flex flex-col">
        <div class="flex items-center space-x-5">
          <p class="text-2xl font-semibold">Manage Porfolio</p>
          <div id="openUpdateForm" class="cursor-pointer">
            <img src="/icons/portfolio/edit-icon.svg" alt="Edit Icon" class="w-5 h-5">
          </div>
        </div>
  
        <div class="mt-10 flex flex-col space-y-5">
          <div class="space-y-2">
            <span class="text-md text-gray-600 font-semibold">Description</span>
            <div class="bg-inherit text-base px-8 py-2 h-32 w-full border-gray-500 border-b resize-none">
              {{auth()->user()->medcert->description}}
            </div>
          </div>
  
          <div class="space-y-2">
            <span class="text-md text-gray-600 font-semibold">Med Cert application status</span>
            <div class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border-b">
              @if(auth()->user()->medcert->status === 'yes')
              <p class="text-sm text-green-500">Already uploaded a medical certificate</p>
              @else
              <p class="text-sm text-red-500">Not yet, need to upload</p>
              @endif
            </div>
          </div>
  
          <div class="space-y-2">
            <span class="text-md text-gray-600 font-semibold">Started Fitness at</span>
            <div class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border-b">
              {{auth()->user()->medcert->started_fitness}}
            </div>
          </div>
        </div>
      </div>
  
      <div class="flex flex-col items-start">
        <div class="flex items-center space-x-5">
          <p class="text-2xl font-semibold">Upload Medical Certificate</p>
          <button>
            <img src="/icons/portfolio/upload-icon.svg" alt="Upload Icon" class="w-5 h-5">
          </button>
        </div>
        <div class="mt-10 flex items-center space-x-8">
          <div class="w-64 h-[350px] border">
            <img 
              id="preview" width="100" height="100" 
              class="w-full h-full z-40"
              src="{{auth()->user()->medcert->getMedURL()}}"
            />
          </div>
        </div>
      </div>
  
    </div>
  </div>
  
  <form method="POST" action="/medcert/update/{{auth()->user()->medcert->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mt-8 w-full grid place-items-center container" id="updateForm">
      <div class="grid grid-cols-2 items-start gap-x-8">
        <div class="flex flex-col">
          <div class="flex items-center relative">
            <div class="flex items-center space-x-5 mr-auto">
              <p class="text-2xl font-semibold">Edit Profile</p>
              <div class="cursor-pointer mr-auto">
                <img src="/icons/portfolio/edit-icon.svg" alt="Edit Icon" class="w-5 h-5">
              </div>
            </div>
            <div class="flex items-center space-x-2">
              <div 
                class="rounded-full text-center px-3 py-1 text-md text-black cursor-pointer"
                id="close"
              >Cancel</div>
              <button 
                type="submit"
                class="rounded-full text-center px-3 py-1 text-md text-white bg-black cursor-pointer"
              >Update</button>
            </div>
          </div>
  
          <div class="mt-10 flex flex-col space-y-5">
            <div class="space-y-2">
              <span class="text-md text-gray-600 font-semibold">Description</span>
              <textarea 
                type="text" 
                class="bg-inherit text-base px-8 py-2 h-32 w-full border-gray-500 border rounded-md resize-none" 
                placeholder="Description..."
                name="description"
              >{{auth()->user()->medcert->description}}</textarea>
              @error('description')
              <p class="text-red-500 text-sm error">{{$message}}</p>
              @enderror
            </div>

            <div class="space-y-2">
              <span class="text-md text-gray-600 font-semibold">Do you have already a Med Cert? if yes, please upload a copy of it</span>
              <div class="py-2 flex items-center space-x-6">
                <div class="flex items-center space-x-3">
                  <input 
                    id="yes"
                    type="radio" 
                    class="w-4 h-4" 
                    name="status"
                    value="yes"
                    {{ auth()->user()->medcert->status === 'yes' ? 'checked' : '' }}
                  />
                  <label for="yes" class="text-md text-gray-600">Yes</label>
                </div>
                <div class="flex items-center space-x-3">
                  <input 
                    id="no"
                    type="radio" 
                    class="w-4 h-4" 
                    name="status"
                    value="no"
                    {{ auth()->user()->medcert->status === 'no' ? 'checked' : '' }}
                  />
                  <label for="no" class="text-md text-gray-600">No</label>
                </div>
              </div>
              @error('status')
              <p class="text-red-500 text-sm error">{{$message}}</p>
              @enderror
            </div>

            <div class="space-y-2">
              <span class="text-md text-gray-600 font-semibold">When have you started your fitness regime?</span>
              <input 
                type="date" 
                class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border rounded-md" 
                name="started_fitness"
                value="{{auth()->user()->medcert->started_fitness}}"
              />
              @error('started_fitness')
              <p class="text-red-500 text-sm error">{{$message}}</p>
              @enderror
            </div>

          </div>
        </div>
  
        <div class="flex flex-col items-start">
          <div class="flex items-center space-x-5">
            <p class="text-2xl font-semibold">Upload Medical Certificate</p>
            <button>
              <img src="/icons/portfolio/upload-icon.svg" alt="Upload Icon" class="w-5 h-5">
            </button>
          </div>
          <div class="mt-10 flex items-center space-x-8">
            <div class="w-64 h-[350px] border">
              <div 
                id="updateFile" 
                class="w-64 h-[350px] border grid place-items-center cursor-pointer hover:border-2 hover:border-black group"
                title="Upload File"
              >
                <img 
                  id="hasfile-preview" width="100" height="100" 
                  class="w-full h-full z-40"
                  src="{{auth()->user()->medcert->getMedURL()}}"
                />
                <img src="/icons/general/upload-icon.svg" alt="" class="w-10 h-10 group-hover:w-11 group-hover:h-11 fixed z-20">
                <input 
                  type="file" 
                  class="fixed z-40 h-8 w-8 invisible" 
                  name="cert_file" 
                  id="updated"
                  onchange="document.getElementById('hasfile-preview').src = window.URL.createObjectURL(this.files[0])"
                >
              </div>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  
  </form>
  
<script>
var display = document.getElementById("displayForm");

var container = document.getElementById("updateForm");

var btn = document.getElementById("openUpdateForm");

var cancel = document.getElementById("close");

btn.onclick = function() {
  container.style.display = "block";
  display.style.display = "none";
}

cancel.onclick = function() {
  container.style.display = "none";
  display.style.display = "block";
}

var success = document.getElementById("updateFile");

success.onclick = function() {
  document.getElementById('updated')?.click()
}
</script>