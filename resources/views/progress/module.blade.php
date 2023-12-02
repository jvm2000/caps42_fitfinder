<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - {{ $enrollee->program->name }}
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
        <img src="{{$enrollee->program->getImageURL()}}" alt="Profile" class="w-36 h-36 rounded-full">

        <div class="space-y-1">
          <div class="flex items-center space-x-2">
            <img src="/dashboard/icons/programs.svg" alt="Profile Icon" class="w-6 h-6">
            <div class="flex flex-col space-y-3">
              <div class="flex items-center space-x-6">
                <p class="text-4xl font-medium">{{$enrollee->program->name}}</p>
                @if($enrollee->program->status === 'active')
                <div class="px-4 py-1 rounded-full bg-green-200 border border-green-800 text-green-800 text-xs">Active</div>
                <div class="px-4 py-1 rounded-full bg-indigo-200 border border-indigo-800 text-indigo-800 text-xs">
                  {{ $enrollee->program->prerequisite ? $enrollee->program->prerequisite->name : 'No Prerequisite' }}
                </div>
                @endif
              </div>

              <div class="flex flex-col space-y-1">
                <p class="text-xl text-neutral-800">{{$enrollee->program->category}}</p>
                <p class="text-sm text-neutral-800">{{$enrollee->program->summary}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <p>{{$percentage}}</p>
  
    @if($enrollee->progress->count() > 0)
    <div class="mt-2">
      <table class="w-full table-auto border-spacing-y-6 border-separate">
        <thead>
          <tr>
            <th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Model's Info</th>
            <th class="text-xl font-medium text-gray-400 py-4 text-left">Procedure</th>
            <th class="py-4">
              <p class="text-xl font-medium text-gray-400 py-4 text-left w-44">Rest Period</p>
            </th>
            <th class="text-xl font-medium text-gray-400 py-4 text-left">Number of sets/reps</th>
            <th class="text-xl font-medium text-gray-400 py-4 text-left">Actions</th>
            <th class="text-xl font-medium text-gray-400 py-4 text-left">Status</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($enrollee->progress as $index => $mod)
          <tr>
            
            <td class="border-l-8 border-indigo-500 py-1 indent-4 text-sm">{{ $mod->module->name }}</td>

            <td class="py-1 text-neutral-950 text-sm w-96 overflow-hidden text-ellipsis">{{ $mod->module->procedure }}</td>

            <td class="py-1 text-neutral-950 text-sm">{{ $mod->module->rest_period }} minute/s</td>

            <td class="py-1 text-sm">
              <p><span class="text-neutral-950">{{ $mod->module->sets }} sets</span> / <span class="text-indigo-500">{{ $mod->module->reps }} reps</span></p>
            </td>

            <td class="py-1 text-sm">
              <p><span class="text-neutral-950">{{ $mod->status }}</span></p>
            </td>

            <td class="py-1">
              <div class="flex items-center space-x-3">
                <form action="/progress/update/{{$mod->id}}" method="POST" enctype="multipart/form-data" >
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status" value="done">
                  <input type="hidden" name="enrollee_id" value="{{$enrollee->id}}">
                  @if($mod->status === 'done')
                      <p>Done</p>
                  @else
                  <button type="submit">Mark as done</button>
                  @endif
                </form>
                <a href="/modules/edit/{{$mod->id}}" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
                  <img src="/icons/programs/edit.svg" alt="" class="w-4 h-4">
                </a>

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