<x-app.modal name="Archive Modal" class="max-w-lg mt-64">
  <x-slot name="button">
    <button class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
      <img src="/icons/programs/archive.svg" alt="" class="w-4 h-4">
    </button>
  </x-slot>

  <form method ="POST" action="/programs/archive/{{$program}}">
    @csrf
    @method('PUT')
    <div class="space-y-8">
      <p class="text-sm"><span class="font-semibold">WARNING!</span> you are now archiving the program "sample". Please keep in note that this will affect all trainees that are currently enroleld.</p>
      <div class="space-y-2">
        <span class="text-md text-gray-600">type "archive" in order to complete processing.</span>
        <input 
          id="inputText"
          type="text" 
          class="'bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md"
        />
      </div>
    </div>
    <input type="text" name="status" value="archive" class="invisible">
    <div class="flex items-center space-x-2 mt-6 relative">
      <div class="mr-auto"></div>
      <div class="flex items-center space-x-2">
        <div 
          id="cancel"
          class="rounded-lg text-center px-6 py-3 text-sm text-black border-2 cursor-pointer"
        >Cancel</div>
      </div>
      <button 
        id="submitButton"
        type="submit"
        disabled
        class="rounded-lg text-center px-6 py-3 text-sm text-white bg-red-500 cursor-pointer disabled:bg-red-400 disabled:cursor-not-allowed"
      >Archive</button>
    </div>
  </form>
</x-app.modal>

<script>
const inputText = document.getElementById('inputText');
const submitButton = document.getElementById('submitButton');

// Add input event listener to the input field
inputText.addEventListener('input', function() {
  submitButton.disabled = inputText.value.trim() !== 'archive';
});
</script>