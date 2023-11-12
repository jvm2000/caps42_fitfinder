<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - {{ $program->name }}
  </x-slot>

  <div class="w-full py-10 px-12 h-full max-h-[54rem] overflow-hidden">
    <div class="flex items-center relative">
      <div class="flex items-center space-x-4 mr-auto">
        <a href="/programs/list">
            <img src="/icons/chevron-left-icon.svg" alt="View Profile" class="w-6 h-6 rotate-180">
        </a>
        <p class="text-3xl font-semibold mr-auto">Program</p>
      </div>
      <x-menu-dropdown />
    </div>

    <div class="py-7 flex items-center justify-between relative w-full border-b-8">
      <div class="flex items-center space-x-6">
        <img src="{{$program->getImageURL()}}" alt="Profile" class="w-36 h-36 rounded-full">

        <div class="space-y-1">
          <div class="flex items-center space-x-2">
            <img src="/dashboard/icons/programs.svg" alt="Profile Icon" class="w-6 h-6">
            <div class="flex flex-col space-y-3">
              <div class="flex items-center space-x-6">
                <p class="text-4xl font-medium">{{$program->name}}</p>
                @if($program->status === 'active')
                <div class="px-4 py-1 rounded-full bg-green-200 border border-green-800 text-green-800 text-xs">Active</div>
                <div class="px-4 py-1 rounded-full bg-indigo-200 border border-indigo-800 text-indigo-800 text-xs">
                  {{ $program->prerequisite ? $program->prerequisite->name : 'No Prerequisite' }}
                </div>
                @endif
              </div>

              <div class="flex flex-col space-y-1">
                <p class="text-xl text-neutral-800">{{$program->category}}</p>
                <p class="text-sm text-neutral-800">{{$program->summary}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <a 
					href="/modules/make/{{$program->id}}"
					type="submit"
					class="rounded-full flex items-center space-x-4 px-6 py-3 absolute bottom-6 right-0 text-md text-white bg-black cursor-pointer w-auto"
				>
					<img src="/icons/programs/plus.svg" class="w-6 h-6">
					<p class="whitespace-nowrap">Create</p>
				</a>
    </div>
 
    @if($program->modules->count() > 0)
    <div class="mt-2">
      <table class="w-full table-auto border-spacing-y-6 border-separate">
        <thead>
          <tr>
            <th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Model's Info</th>
            <th class="text-xl font-medium text-gray-400 py-4 text-left">Summary</th>
            <th class="py-4">
              <p class="text-xl font-medium text-gray-400 py-4 text-left w-44">Duration</p>
            </th>
            <th class="text-xl font-medium text-gray-400 py-4 text-left">Scheduled Days</th>
            <th class="text-xl font-medium text-gray-400 py-4 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($program->modules as $index => $module)
          <tr>
            <td class="border-l-8 border-indigo-500 py-1 indent-4 text-sm">{{ $module->name }}</td>

            <td class="py-1 text-neutral-950 text-sm w-96 overflow-hidden text-ellipsis">{{ $module->summary }}</td>

            <td class="py-1 text-neutral-950 text-sm">{{ $module->duration }}</td>

            <td class="py-1 text-neutral-950 text-sm">
             <div class="flex items-center space-x-2">
                @foreach ($module->schedule as $day)
                  @if($day === 'monday')
                  <div class="w-7 h-7 bg-indigo-500 rounded-full grid place-items-center text-xs text-white">M</div>
                  @elseif($day == 'tuesday')
                  <div class="w-7 h-7 bg-indigo-500 rounded-full grid place-items-center text-xs text-white">T</div>
                  @elseif($day == 'wednesday')
                  <div class="w-7 h-7 bg-indigo-500 rounded-full grid place-items-center text-xs text-white">W</div>
                  @elseif($day == 'thursday')
                  <div class="w-7 h-7 bg-indigo-500 rounded-full grid place-items-center text-xs text-white">Th</div>
                  @elseif($day == 'friday')
                  <div class="w-7 h-7 bg-indigo-500 rounded-full grid place-items-center text-xs text-white">Th</div>
                  @elseif($day == 'saturday')
                  <div class="w-7 h-7 bg-indigo-500 rounded-full grid place-items-center text-xs text-white">S</div>
                  @elseif($day == 'sunday')
                  <div class="w-7 h-7 bg-indigo-500 rounded-full grid place-items-center text-xs text-white">Su</div>
                  @endif
              @endforeach
             </div>
            </td>

            <td class="py-1">
              <div class="flex items-center space-x-3">
                <a href="/modules/edit/{{$module->id}}" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
                  <img src="/icons/programs/edit.svg" alt="" class="w-4 h-4">
                </a>

                <x-modules.modal.delete :module="$module" :index="$index" />

              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @else
    <div>Empty Modules</div>
    @endif
  </div>

  @if(session('message'))
    <x-app.toaster message="{{ session('message') }}">
    </x-app.toaster>
  @endif
</x-layout>