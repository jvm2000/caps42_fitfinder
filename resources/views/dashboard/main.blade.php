<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Dashboard
  </x-slot>
  <div class="w-full py-14 px-12 relative">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Dashboard</p>
    </div>
    <div class="absolute top-10 right-12 z-20">
      <x-menu-dropdown />
    </div>
    {{-- Matchmakes Tab  --}}
    <div class="mt-12 pl-10 space-y-12 h-full max-h-[680px] overflow-y-auto">
      {{-- Matching Trainee  --}}
      @if ($matching->count() > 0)
        @foreach ($matching as $match)
        <div class="bg-zinc-100 max-w-xl w-full rounded-xl shadow-lg flex">
          <div class="w-52 h-48 relative">
            <img src="{{ url('storage/' . $match->image) }}" alt="Trainee Pic" class="w-full h-full rounded-l-xl">
          </div>
          <div class="p-6 relative h-44">
            <div class="space-y-4">
              <p class="text-2xl font-bold capitalize">{{ $match->first_name }} {{ $match->last_name }}</p>
              <p class="text-base text-gray-600">summary sample</p>
            </div>
            <p class="absolute bottom-0 left-6"><span class="font-medium">
              Tags</span>: <span class="font-light">{{ $match->tags }}</span></p> 
          </div>
          <br>
          <a href="{{ route('viewprofile', ['id' => $match->id]) }}" class="btn btn-primary">View Profile</a>
          <button style="color:aqua;background-color:bisque">
          
        </div>
        @endforeach

        @else
        <div class="mt-44 w-[38rem] grid place-items-center space-y-4">
          <img src="/empty/matchmake.svg" alt="Empty Matchmake">
          <p class="text-gray-300 text-lg font-medium">No Matchmake has found.</p>
        </div>
      @endif
    </div>

    {{-- Right Tab  --}}
    <div class="absolute top-0 right-0 bg-[#F6F6F6] w-full max-w-md h-[860px] z-10 rounded-r-3xl"></div>
  </div>
</x-layout>  