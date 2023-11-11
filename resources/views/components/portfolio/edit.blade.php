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
            {{auth()->user()->portfolio->description}}
          </div>
        </div>

        <div class="space-y-2">
          <span class="text-md text-gray-600 font-semibold">Recent Works</span>
          <div class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border-b">
            {{auth()->user()->portfolio->recent_works}}
          </div>
        </div>

        <div class="space-y-2">
          <span class="text-md text-gray-600 font-semibold">What are some of your hobbies?</span>
          <div class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border-b">
            {{auth()->user()->portfolio->hobbies}}
          </div>
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
        <div class="w-64 h-[350px] border"></div>
        <div class="w-64 h-[350px] border"></div>
      </div>
    </div>

  </div>
</div>

<form method="POST" action="/portfolio/update/{{auth()->user()->portfolio->id}}" enctype="multipart/form-data" >
  @csrf
  @method('PUT')
  <div class="mt-8 w-full grid place-items-center container" id="updateForm">
    <div class="grid grid-cols-2 items-start gap-x-8">
      <div class="flex flex-col">
        <div class="flex items-center relative">
          <div class="flex items-center space-x-5 mr-auto">
            <p class="text-2xl font-semibold">Edit Porfolio</p>
            <div id="close" class="cursor-pointer mr-auto">
              <img src="/icons/portfolio/edit-icon.svg" alt="Edit Icon" class="w-5 h-5">
            </div>
          </div>
          <div class="flex items-center space-x-2">
            <button 
              class="rounded-full text-center px-3 py-1 text-md text-black cursor-pointer"
              id="close"
            >Cancel</button>
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
              class="bg-inherit text-left text-base px-8 py-2 h-32 w-full border-gray-500 border rounded-md resize-none" 
              placeholder="Description..."
              name="description"
            >{{auth()->user()->portfolio->description}}</textarea>
            @error('description')
            <p class="text-red-500 text-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="space-y-2">
            <span class="text-md text-gray-600 font-semibold">Recent Works</span>
            <input 
              type="text" 
              class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border rounded-md" 
              placeholder="State your recent works"
              name="recent_works"
              value="{{auth()->user()->portfolio->recent_works}}"
            />
            @error('recent_works')
            <p class="text-red-500 text-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="space-y-2">
            <span class="text-md text-gray-600 font-semibold">What are some of your hobbies?</span>
            <input 
              type="text" 
              class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border rounded-md" 
              placeholder="State your hobbies"
              name="hobbies"
              value="{{auth()->user()->portfolio->hobbies}}"
            />
            @error('hobbies')
            <p class="text-red-500 text-sm">{{$message}}</p>
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
          <input type="file" name="form_document">
        </div>
        <div class="mt-10 flex items-center space-x-8">
          <div class="w-64 h-[350px] border"></div>
          <div class="w-64 h-[350px] border"></div>
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
  </script>