<x-layout>
    <x-slot:title>
        FitFinder - Contracts
    </x-slot:title>
    <div class="w-full overflow-y-auto h-[50rem] py-10 px-12">
        <div class="flex items-center relative">
          <p class="text-3xl font-semibold mr-auto">Contracts</p>
          <x-menu-dropdown />
        </div>
        
        
        <div class="mt-10 grid grid-cols-2 w-full gap-x-8 items-center">
            {{-- first column  --}}
            <div class="space-y-6">
                <div class="flex items-center flex-row space-x-6">
                    <div class="w-16 h-16 rounded-full border">
                        <div class="w-full h-full rounded-full bg-red-400"> </div>
                        <div></div>
                    </div>
                    <div class="text-zinc-900 text-3xl font-bold"> John Doe</div>
                </div>
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Programs</p>
                    <select 
                        type="text" 
                        class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" 
                        name="role"
                    >
                        <option value="" selected disabled>Enter Program</option>
                        <option value="Coach">Coach</option>
                        <option value="Trainee">Trainee</option>
                    </select>
                </div> 
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Trainee</p>
                    <select 
                        type="text" 
                        class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" 
                        name="role"
                    >
                        <option value="" selected disabled>Select Trainee</option>
                        <option value="Coach">Coach</option>
                        <option value="Trainee">Trainee</option>
                    </select>
                </div>
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Interests</p>
                    <select 
                        type="text" 
                        class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" 
                        name="role"
                    >
                        <option value="" selected disabled>Select Interests</option>
                        <option value="Coach">Coach</option>
                        <option value="Trainee">Trainee</option>
                    </select>
                </div> 
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Address</p>
                        <input type="text" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" placeholder="Enter address">
                </div> 
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Email Address</p>
                        <input type="text" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" placeholder="Enter email address">
                </div> 
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Phone Number</p>
                        <input type="text" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" placeholder="Enter phone number">
                </div> 
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold"> Start Date</p>
                    <input type="date" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none "> 
                </div>
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold"> End Date</p>
                    <input type="date" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none "> 
                </div>    
                <div class="flex items-center space-x-4">
                    <button type="submit" class="rounded-md flex items-center px-6 py-3 text-md text-white bg-black cursor-pointer active:mt-[1px]"> Generate </button>
                  </div>
            </div>

        </div>

        
</x-layout>
{{-- <div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <h1>hello</h1>
    <form action="{{ route('generate.contract') }}" method="POST">
        @csrf
        <select id="programs" name="programs">
            <option value="">Select a Program</option>
            @foreach($programs as $program)
            <option value="{{ $program }}">{{ $program }}</option>
        @endforeach
        </select>
         <br>
         <select id="traineeUsername" name="traineeUsername">
            <option value="">Select a Trainee</option>
            @foreach ($first_name as $key => $fname)
                @php
                    $lname = $last_name[$key] ?? ''; // Fetch the corresponding last name
                @endphp
                <option value="{{ $fname . $lname }}">{{ $fname . ' ' . $lname }}</option>
            @endforeach
        </select>
      
        <br>
        <select id="tags" name="tags">
        <option value="">Select an Interest</option>
        @foreach ($tags as $traineeTags)
            <option value="{{ $traineeTags }}">{{ $traineeTags }}</option>
        @endforeach
        </select>
        <br>
        @foreach ($address as $traineeAddress)
            Trainee Address: <input type="text" name="traineeAddress" value="{{ $traineeAddress }}">
        @endforeach
        <br>
        @foreach ($email as $traineeEmailAddress)
            Trainee Email Address: <input type="text" name="traineeEmailAddress" value="{{$traineeEmailAddress}}">
        @endforeach
        <br>
        @foreach($phone_number as $traineePhoneNumber)
            Trainee Phone Number: <input type="text" name="traineePhoneNumber" value="{{$traineePhoneNumber}}">
        @endforeach
        <br>
        <label for="startDate">Start Date:</label>
         <input type="date" id="startDate" name="startDate"><br>

        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate"><br>
         <button type="submit">submit</button>
        <br>
        <!-- Display Trainee Addresses -->


    </form>
        <!-- @if($contract->count())
            @foreach($contract as $contracts)
                <div>
                    <a href="">{{$contracts->user->first_name}} </a>
                    <span>{{$contracts->created_at}}</span>
                    <p>{{$contracts->address}}</p>
                </div>
            @endforeach
         @else
            No contracts
         @endif -->
</div> --}}
