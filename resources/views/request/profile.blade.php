<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Profile
  </x-slot>
  <div class="w-full py-10 px-12 overflow-y-auto h-full max-h-[54rem] overflow-x-hidden">
    <div class="flex items-center relative space-x-4">
      <div class="flex items-center space-x-4 mr-auto">
        <a href="/main">
          <img src="/icons/chevron-left-icon.svg" alt="View Profile" class="w-6 h-6 rotate-180">
        </a>
        <p class="text-3xl font-semibold mr-auto">Profile</p>
      </div>
      <x-menu-dropdown />
    </div>
         
    <div class="py-7 flex items-center relative w-full border-b-8">
      <div class="flex items-center space-x-6 mr-auto">
        <img src="{{ url('storage/' . $user->image) }}" alt="Profile" class="w-36 h-36 rounded-full">
      

        <div class="space-y-1">
          <div class="flex items-center space-x-2">
            <img src="/icons/settings/profile-icon.svg" alt="Profile Icon" class="w-6 h-6">
            <p class="text-base font-medium">{{$user->username}}</p>
          </div>

          <p class="text-3xl font-semibold">{{$user->first_name}} {{$user->last_name}}</p>
          <p class="text-2xl font-medium text-indigo-500">{{$user->role}}</p>
         
          <!-- "Send Request" form -->
          <form method="POST" action="{{ route('sendRequest') }}">
                @csrf
                <input type="hidden" name="trainee_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="coach_id" value="{{ $user->id }}">
                <button type="submit" name="sendRequest" class="btn btn-primary" style="background-color: yellow;">Send Request</button>
            </form>
        </div>
      </div>
      
      <div class="grid grid-cols-4 items-center gap-x-6 gap-y-5">
        <div class="space-y-1 col-span-1">
          <p class="text-base font-semibold">Gender:</p>
          <p class="text-base font-normal">{{$user->gender}}</p>
        </div>

        <div class="space-y-1 col-span-2 pl-2">
          <p class="text-base font-semibold">Phone Number:</p>
          <p class="text-base font-normal">{{$user->phone_number}}</p>
        </div>

        <div class="space-y-1 col-span-1 text-center">
          <p class="text-base font-semibold">Age</p>
          <p class="text-base font-normal">{{$user->getAgeAttribute()}}</p>
        </div>

        <div class="space-y-1 col-span-4">
          <p class="text-base font-semibold">Tags</p>
          <div class="flex items-center space-x-2">
            @foreach($user->tags as $tag)
              <p class="text-base font-normal capitalize">{{ $tag }},</p>
            @endforeach
          </div>
        </div>
      </div>
      
          </div>
          <div class="py-7 flex items-center relative w-full border-b-8">
          <div class="mt-10 flex flex-col space-y-5">
            @if ($user->portfolio)
              <div class="space-y-2">
                <span class="text-md text-gray-600 font-semibold">Description</span>
                <p class="text-base">Description: {{ $user->portfolio->description }}</p>
                @error('description')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </div>

              <div class="space-y-2">
                <span class="text-md text-gray-600 font-semibold">Recent Works</span>
                <p class="text-base">Recent Works: {{ $user->portfolio->recent_works }}</p>
                @error('recent_works')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </div>

              <div class="space-y-2">
                <span class="text-md text-gray-600 font-semibold">What are some of your hobbies?</span>
                <p class="text-base">Hobbies: {{ $user->portfolio->hobbies }}</p>
                @error('hobbies')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </div>
            </div>
            @endif
          </div>
        </div>
      
    <div class="mt-8"> 
      
    </div>
  </div>
</x-layout>
