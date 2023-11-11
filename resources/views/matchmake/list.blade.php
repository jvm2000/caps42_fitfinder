<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Matchmakes
  </x-slot>
  <div class="w-full py-14 px-12 relative">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Matchmakes</p>
    </div>
    <div class="absolute top-10 right-12 z-20">
      <x-menu-dropdown />
    </div>
    {{-- Matchmakes Tab  --}}
    <div class="mt-12 flex flex-col items-center w-full space-y-12 h-full max-h-[680px] overflow-y-auto">
      {{-- Matching Trainee  --}}
      @if ($matching->count() > 0)
        @foreach ($matching as $match)
        <div class="bg-zinc-100 max-w-xl w-full rounded-xl shadow-lg flex relative">
          <div class="w-52 h-48 relative">
            @if($match->image !== null)
              <img src="{{ url('storage/' . $match->image) }}" alt="Trainee Pic" class="w-full h-full rounded-l-xl">
            @else
            <img src="default.jpg" alt="Trainee Pic" class="w-full h-full rounded-l-xl">
            @endif
          </div>
          <div class="p-6 relative h-44">
            <div class="space-y-4">
              <p class="text-2xl font-bold capitalize">{{ $match->first_name }} {{ $match->last_name }}</p>

              @if(auth()->user()->role === 'Trainee' && $match->portfolio && $match->portfolio->count() > 0)
                  <p class="text-base text-gray-600">{{ $match->portfolio->description }}</p>
              @elseif(auth()->user()->role === 'Coach' && $match->medcert && $match->medcert->count() > 0)
                  <p class="text-base text-gray-600">{{ $match->medcert->description }}</p>
              @endif

            </div>
            <p class="absolute bottom-0 left-6"><span class="font-medium">
              Tags</span>: <span class="font-light">
                @foreach ($match->tags as $tag)
                  {{ $tag }},
                @endforeach
              </span></p> 
          </div>
          <a href="/matchmakes/view/{{$match->id}}" class="absolute bottom-6 right-6">
            <img src="/icons/chevron-left-icon.svg" alt="View Profile" class="w-6 h-6">
          </a>
          
        </div>
        @endforeach

        @else
        <div class="mt-44 w-[38rem] grid place-items-center space-y-4">
          <img src="/empty/matchmake.svg" alt="Empty Matchmake">
          <p class="text-gray-300 text-lg font-medium">No Matchmake has found.</p>
        </div>
      @endif
    </div>
  </div>
</x-layout>  