<button onclick="openEvaluateModal({{ $index }})" class="rounded-full py-2 text-sm px-2 text-white bg-green-500 cursor-pointer w-auto">
  Evaluate
</button>

<div id="evaluateModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">

  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl text-black font-medium">Evaluate {{ $enrollee->trainee->first_name }} {{ $enrollee->trainee->last_name }} | Progress</p>
        <button onclick="closeEvaluateModal({{ $index }})" class="absolute right-8 ">
          <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4cursor-pointer active:mt-1">
        </button>
      </div>
      {{-- Slot  --}}
      <div class="px-8 pt-6 pb-4">
        <table class="w-full table-auto border-separate border-spacing-2">
          <thead>
            <tr>
              <th class="text-sm font-medium text-gray-400 py-4 text-left">Module Name</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Sets/Reps</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left indent-2">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($enrollee->progress as $progress)
              <tr class="">
                <td class="text-sm font-medium py-2 border-l-4 border-indigo-500">
                  <p class="text-sm font-medium text-gray-900 pl-4">{{ $progress->module->name }}</p>
                </td>
                <td class="text-sm font-medium py-2">
                  <p class="text-sm font-medium text-gray-900 pl-4">{{ $progress->module->sets }} / {{ $progress->module->reps }}</p>
                </td>
                <td class="text-sm font-medium py-2">
                  <div class="flex items-center space-x-1">
                    <span 
                      class="w-2 h-2 
                      @if($progress->status === 'done')
                        bg-green-500
                      @else
                        bg-red-500
                      @endif
                    rounded-full"></span>
                    <p class="text-sm font-medium 
                      @if($progress->status === 'done')
                      text-green-500
                      @else
                        text-red-500
                      @endif
                    pl-4">{{ $progress->status }}</p>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <form action="/enrollee/create" method="post">
          @csrf
        <div class="space-y-2">
          <span class="text-sm text-gray-900">Type meeting link</span>
          <input 
            id="inputText"
            name="meet_link"
            type="text" 
            class="'bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md"
            autocomplete="off"
            placeholder="Enter Meeting Link"
          />
          <button type="submit">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
function openEvaluateModal(index){
  var evaluateModal = document.getElementById('evaluateModal_' + index);
  evaluateModal.style.display = 'block';
}

function closeEvaluateModal(index){
  var evaluateModal = document.getElementById('evaluateModal_' + index);
  evaluateModal.style.display = 'none';
}
</script>