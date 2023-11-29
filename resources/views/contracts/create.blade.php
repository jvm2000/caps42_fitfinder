<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Contracts
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Create Contracts</p>
      <x-menu-dropdown />
    </div>

    <form method="POST" action="/contracts/create/{{auth()->user()->id}}" enctype="multipart/form-data">
      @csrf
      <div class="mt-24 w-full grid place-items-center">
        <div class="max-w-4xl w-full">
          <div class="grid grid-cols-2 items-start w-full">
            <div class="flex flex-col space-y-6">
              <div class="flex flex-col space-y-3">
                <div class="space-y-2 w-full">
                  <span class="text-md text-gray-600">Trainee</span>
                  <select 
                    class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" 
                    name="traineeUsername"
                  >
                  @foreach ($requests as $request)
                  <option value="{{ $request->requester->id }}">{{ $request->requester->first_name . ' ' . $request->requester->last_name }}</option>
                  @endforeach
                  </select> 
                  @error('name')
                  <p class="text-red-500 text-sm">{{$message}}</p>
                  @enderror
                </div >
                <div class="space-y-2 w-full">
                  <span class="text-md text-gray-600">Program</span>
                  <select 
                    class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" 
                    name="traineeUsername"
                  >
                  @foreach ($programs as $program)
                  <option value="{{ $program->id }}">{{ $program->name }}</option>
                  @endforeach
                  </select> 
                  @error('name')
                  <p class="text-red-500 text-sm">{{$message}}</p>
                  @enderror
                </div >
                <div class="space-y-2 w-full">
                <span class="text-md text-gray-600">Address</span>
                <input 
                    type="text" 
                    class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md" 
                    name="traineeAddress" value="{{ $requests->first()->requester->address . ' ' . $requests->first()->requester->city }}"
                  >
                </div>
                <div class="space-y-2 w-full">
                <span class="text-md text-gray-600">Email Address</span>
                <input 
                    type="text" 
                    class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md" 
                    name="traineeEmailAddress" value="{{ $requests->first()->requester->email}}"
                  >
                </div>
                <div class="space-y-2 w-full">
                <span class="text-md text-gray-600">Trainee Phone Number</span>
                <input 
                    type="text" 
                    class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md" 
                    name="traineePhoneNumber" value="{{ $requests->first()->requester->phone_number}}"
                  >
                </div>
                <div class="space-y-2 w-full">
                  <span class="text-md text-gray-600">Select Payments</span>
                  <select 
                    class="bg-inherit text-sm px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" 
                    name="payments"
                  >
                    <option value="" disabled selected>Select Payments</option>
                    <option value="gcash">Gcash</option>
                    <option value="paypal">Paypal</option>
                    <option value="applepay">Applepay</option>
                  
                  </select> 
                  @error('category')
                  <p class="text-red-500 text-sm">{{$message}}</p>
                  @enderror
                </div>
      
                <div class="space-y-2">
                  <span class="text-md text-gray-600">Start Date:</span>
                  <input 
                    type="date" 
                    class="bg-inherit text-sm px-8 py-4  border-gray-500 border rounded-md" 
                    name="startDate"
                  ></input>
                  @error('summary')
                  <p class="text-red-500 text-sm">{{$message}}</p>
                  @enderror
                </div>
                <div class="space-y-2">
                  <span class="text-md text-gray-600">End Date:</span>
                  <input 
                    type="date" 
                    class="bg-inherit text-sm px-8 py-4  border-gray-500 border rounded-md" 
                    name="endDate"
                  ></input>
                  @error('summary')
                  <p class="text-red-500 text-sm">{{$message}}</p>
                  @enderror
                </div>
              </div>
            </div>
    
          </div>
  
          <div class="mt-20 flex items-center relative mr-12">
            <div class="mr-auto"></div>
            <div class="flex items-center space-x-4">
              <a 
                href="/programs/list"
                class="rounded-md flex items-center px-6 py-3 text-md text-black border-2 border-black cursor-pointer active:mt-[1px]"
              >
                Cancel
              </a>
              <button 
                type="submit"
                class="rounded-md flex items-center px-6 py-3 text-md text-white bg-black cursor-pointer active:mt-[1px]"
              >
                Create
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>
</x-layout>
