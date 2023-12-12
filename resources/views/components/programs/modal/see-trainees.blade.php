<button onclick="openSeeTraineesModal({{ $index }})" class="rounded-full py-2 text-sm px-2 text-white bg-green-500 cursor-pointer w-auto">
  See Trainees
</button>

<div id="seeTraineesModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden">

  <div class="flex items-center justify-end h-full">
    <div class="w-full max-w-xl bg-white h-full absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6">
        <p class="text-xl font-medium">{{ $active->name }}'s Trainees</p>
        <button onclick="closeTraineesModal({{ $index }})" class="absolute right-8 ">
          <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4cursor-pointer active:mt-1">
        </button>
      </div>
      {{-- Slot  --}}
      <div class="px-8 pt-6 pb-4">
        <table class="w-full table-auto">
          <thead>
            <tr>
              <th class="text-sm font-medium text-gray-400 py-4 text-left indent-16">Full Name</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Status</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($active->enrollees as $index => $enrollee)
              <tr class="border-t">
                <td class="text-sm font-medium text-gray-400 py-4">
                  <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 rounded-full relative">
                      <img src="{{ $enrollee->trainee->getImageURL() }}" alt="" class="w-full h-full rounded-full">
                    </div>
                    <p class="text-sm font-medium text-gray-900">{{ $enrollee->trainee->first_name }} {{ $enrollee->trainee->last_name }}</p>
                  </div>
                </td>
                <td class="text-sm font-medium text-gray-400 py-4">
                  <div class="flex items-center space-x-4">
                    <span class="w-3 h-3 
                      @if($enrollee->completion === 'submitted for evaluation')
                        bg-yellow-500
                      @else
                        bg-red-500
                      @endif
                    rounded-full"></span>
                    <p class="text-sm">
                      @if(!$enrollee->completion)
                      ongoing
                      @else
                      {{ $enrollee->completion }}
                      @endif
                    </p>
                  </div>
                </td>
                <td class="text-sm font-medium text-gray-400 py-4">
                  <x-programs.modal.evaluate :index="$index" :enrollee="$enrollee" />
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  
    </div>
  </div>
</div>

<script>
function openSeeTraineesModal(index){
  var seeTraineesModal = document.getElementById('seeTraineesModal_' + index);
  seeTraineesModal.style.display = 'block';
}

function closeTraineesModal(index){
  var seeTraineesModal = document.getElementById('seeTraineesModal_' + index);
  seeTraineesModal.style.display = 'none';
}
</script>