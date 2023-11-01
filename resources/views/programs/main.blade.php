<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Programs
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Programs</p>
      <x-menu-dropdown />
    </div>

    <div class="mt-20 flex flex-col space-y-10">
      <div class="flex place-items-center h-14 relative">
        <div class="relative h-14 text-center w-52">
          <p class="text-xl font-semibold text-indigo-500">Active</p>
          <div class="w-52 border-b-8 border-indigo-500 absolute bottom-0 z-20"></div>
        </div>

        <div class="relative h-14 text-center w-56">
          <p class="text-xl font-medium text-gray-500">Archive</p>
          <div class="w-52 border-b-8 absolute bottom-0 z-20"></div>
        </div>

        <a 
          href="/programs/make"
          type="submit"
          class="rounded-full flex opa items-center space-x-4 px-6 py-3 text-md text-white bg-black cursor-pointer w-auto absolute right-0 bottom-4 active:bottom-[15px]"
        >
          <img src="/icons/programs/plus.svg" class="w-6 h-6">
          <p class="whitespace-nowrap">Create</p>
        </a>

        <div class="w-full border-b-8 mt-12 z-10"></div>
      </div>
    </div>

    @if ($programs->count() > 0) 
      {{-- Table  --}}
      <div class="mt-2">
        <table class="w-full table-auto border-spacing-y-6 border-separate">
          <thead>
            <tr>
              <th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Program's Info</th>
              <th class="text-xl font-medium text-gray-400 py-4 text-left">Summary</th>
              <th class="py-4">
                <p class="text-xl font-medium text-gray-400 py-4 text-left w-44">Number of Trainees Enrolled</p>
              </th>
              <th class="text-xl font-medium text-gray-400 py-4 text-left">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($programs as $program)
            <tr class="">
              <td class="border-l-8 border-indigo-500 py-1">
                <div class="ml-4 flex items-center space-x-4">
                  <div class="w-9 h-9 rounded-full bg-blue-400"></div>
                  <div class="text-left">
                    <p class="text-black text-sm font-medium">{{$program->name}}</p>
                    <p class="text-xs text-zinc-400">{{$program->category}}</p>
                  </div>
                </div>
              </td>

              <td class="py-1">
                <p class="text-sm text-ellipsis">{{$program->summary}}</p>
              </td>
              <td class="py-2">
                <p class="text-sm"><span class="text-red-500">10</span> / 30</p>
              </td>

              <td class="py-2">
                <div class="flex items-center space-x-3 relative">
                  <button class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
                    <img src="/icons/programs/view.svg" alt="" class="w-4 h-4">
                  </button>

                  <button class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
                    <img src="/icons/programs/edit.svg" alt="" class="w-4 h-4">
                  </button>

                  <button class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
                    <img src="/icons/programs/archive.svg" alt="" class="w-4 h-4">
                  </button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <div class="mt-36 w-full grid place-items-center space-y-4">
        <img src="/empty/programs.svg" alt="Empty Stage">
        <p class="text-gray-300 text-lg font-medium">You have no programs added yet.</p>
      </div>
    @endif
  </div>
</x-layout>