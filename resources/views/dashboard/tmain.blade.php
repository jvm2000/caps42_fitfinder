<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Dashboard
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Dashboard</p>
      <x-menu-dropdown />
    </div>
      <h1>Matchmaking Result</h1>
      
    @if ($matchingTrainers->count() > 0)
        <h2>Matching Trainers:</h2>
        @foreach ($matchingTrainers as $trainer)
        <p>Coach: {{ $trainer->first_name }} {{ $trainer->last_name }}</p>
        <form action="{{ route('send.request') }}" method="post">
            @csrf
            <input type="hidden" name="trainee_id" value="{{ $t_id }}">
            <input type="hidden" name="coach_id" value="{{ $trainer->id }}">
            <button type="submit" name="sendRequest" style="color: blue">Send Request</button>
        </form>
    @endforeach
    @else
        <p>No matching trainers found.</p>
    @endif
    
        

    </div>
  </div>
</x-layout>