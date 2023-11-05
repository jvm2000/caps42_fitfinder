<x-app.modal name="Restore Modal" class="max-w-lg mt-64">
  <x-slot name="button">
    <button class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
      <img src="/icons/programs/restore.svg" alt="" class="w-4 h-4">
    </button>
  </x-slot>

  <form method ="POST" action="/programs/restore/{{$program}}">
    @csrf
    @method('PUT')
    <div class="space-y-8">
      <p class="text-sm">You are now restoring this program.</p>
    </div>
    <input type="text" name="status" value="active" class="invisible">
    <div class="flex items-center space-x-2 mt-6 relative">
      <div class="mr-auto"></div>
      <div class="flex items-center space-x-2">
        <div 
          id="cancel"
          class="rounded-lg text-center px-6 py-3 text-sm text-black border-2 cursor-pointer"
        >Cancel</div>
      </div>
      <button 
        type="submit"
        class="rounded-lg text-center px-6 py-3 text-sm text-white bg-green-500 cursor-pointer"
      >Restore</button>
    </div>
  </form>
</x-app.modal>