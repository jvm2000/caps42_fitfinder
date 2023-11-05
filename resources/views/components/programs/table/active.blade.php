@if ($programs->where('status', 'active')->count() > 0)
<div id="Active" class="tabcontent">
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
            <img src="{{$program->getImageURL()}}" class="w-9 h-9 rounded-full">
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
@endif