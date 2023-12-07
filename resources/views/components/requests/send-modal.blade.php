<x-app.request-modal name="Make Request" class="max-w-lg mt-44">
  <x-slot name="button">
    <button class="rounded-md text-center px-6 py-3 text-md text-black border-2 active:mt-[1px] cursor-pointer">Make Request</button>
  </x-slot>
  <form action="/matchmakes/send-request" method="POST">
    {{-- Requests Values  --}}
    @csrf
    <input type="hidden" name="trainee_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="coach_id" value="{{ $user->id }}">

    <div class="flex flex-col space-y-4 pb-4">
      <div class="flex flex-col space-y-1">
        <p class="text-sm font-semibold">From:</p>
        <p class="text-sm">{{auth()->user()->first_name}} {{auth()->user()->last_name}} / <span class="text-indigo-500 font-medium">{{auth()->user()->username}}</span></p>
      </div>
  
      <div class="flex flex-col space-y-1">
        <p class="text-sm font-semibold">To:</p>
        <p class="text-sm">{{$user->first_name}} {{$user->last_name}} / <span class="text-indigo-500 font-medium">{{$user->username}}</span></p>
      </div>
      <div class="space-y-2">
        <label class="text-sm text-black">Select Program</label>
        <select 
          type="text" 
          class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2 appearance-none" 
          name="program_id"
        >
          <option value="" selected>Choose Program to Enroll</option>
          @foreach($programs as $index => $program)
          {{-- Still need fix --}}
          @if(auth()->user()->contracts() )
            <option value="{{ $program->id }}">{{ $program->name }}</option>
          @endif
          @endforeach
        </select>
        @error('program_id')
        <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
      </div>
  
      <div class="space-y-2">
        <label class="text-sm text-black">Message</label>
        <textarea 
          class="bg-inherit text-sm px-6 py-2 h-20 w-full border-gray-500 border rounded-md col-span-2 appearance-none"
          name="message"
          placeholder="Enter message"
        ></textarea>
        @error('message')
        <p class="text-red-500 text-sm">{{$message}}</p>
        @enderror
      </div>
    </div>
    <button name="sendRequest" class="rounded-md text-center px-6 py-4 text-sm bg-black text-white w-full border-2 mt-4 active:mt-[17px] cursor-pointer">Send</button>
  </form>
</x-app.modal>