<x-layout>
    <x-slot:title>
        FitFinder - Payment
    </x-slot:title>
    <div class="w-full overflow-y-auto h-[50rem] py-10 px-12">
        <div class="flex items-center relative">
          <p class="text-3xl font-semibold mr-auto">Payment</p>
          <x-menu-dropdown />
        </div>
        
        <div class="mt-10 grid grid-cols-2 w-full gap-x-8 items-center">
            <div class="mt-6 space-y-6">
                
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Card Number</p>
                            <input type="text" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" placeholder="Enter card number"> 
                    </div>
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Expiration Date Card</p>
                        <input type="text" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" placeholder="Enter expiration">
                </div>
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">CVV</p>
                    <input type="text" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" placeholder="Enter CVV"> 
                </div> 
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Lastname</p>
                        <input type="text" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" placeholder="Enter lastname">
                </div> 
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Firstname</p>
                        <input type="text" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" placeholder="Enter firstname">
                </div> 
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold">Billing Zip Code</p>
                        <input type="input" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" placeholder="Enter billing zip code">
                </div> 
                <div class="flex-col flex space-y-1">
                    <p class="text-neutral-400 text-base font-semibold"> Amount </p>
                    <input type="number" class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" placeholder="0.00"> 
                </div>

                    <div class="flex items-center space-x-4">
                      <button type="submit" class="rounded-md flex items-center px-6 py-3 text-md text-white bg-black cursor-pointer active:mt-[1px]"> Submit </button>
                    </div>

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
