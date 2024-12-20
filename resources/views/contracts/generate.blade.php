<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Create Contract
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Create Contract</p>
      <x-menu-dropdown />
    </div>

    <form action="/contracts/generate/{{ auth()->user()->id }}" method="POST">
      @csrf
      <input type="text" name="coach_id" value="{{ auth()->user()->id }}" class="invisible">
      <input type="text" name="request_id" value="{{ $request->id }}" class="invisible">
      <div class="mt-24 w-full grid place-items-center">
        <div class="max-w-4xl w-full">
          <div class="grid grid-cols-2 items-start w-full gap-x-8">
            <div class="flex flex-col space-y-2">
              <div class="flex flex-col space-y-2">
                <span class="text-md text-gray-600">Trainee's Info</span>
                <div class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md flex items-center space-x-4 relative">
                  <img src="{{ $request->requester->getImageURL() }}" alt="" class="w-6 h-6 rounded-full ml-0">
                  <p class="text-lg text-black">{{ $request->requester->first_name }} {{ $request->requester->last_name }}</p>
                  <input type="text" name="trainee_id" class="invisible absolute left-0 z-20" value="{{ $request->trainee_id }}">
                </div>
              </div>
  
              <x-app.input 
                type="text" 
                label="Trainee's Full Address" 
                name=""
                value="{{ $request->requester->address }} {{ $request->requester->city }}"
              >
                <x-slot name="errors">
                  @error('')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>
  
              <x-app.input 
                type="text" 
                label="Trainee's Email Address" 
                name=""
                value="{{ $request->requester->email }}"
              >
                <x-slot name="errors">
                  @error('')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>

              <x-app.input 
                type="text" 
                label="Trainee's Phone Number" 
                name=""
                value="{{ $request->requester->phone_number }}"
              >
                <x-slot name="errors">
                  @error('')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>
            </div>
            
            <div class="flex flex-col space-y-2.5">
              <div class="flex flex-col space-y-2">
                <span class="text-md text-gray-600">Program Selected</span>
                <div class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md flex items-center space-x-4 relative">
                  <img src="{{ $request->programs->getImageURL() }}" alt="" class="w-6 h-6 rounded-full ml-0">
                  <p class="text-lg text-black">{{ $request->programs->name }}</p>
                  <input type="text" class="invisible absolute left-0 z-20" name="program_id" value="{{ $request->programs->id }}">
                </div>
              </div>

              <div class="space-y-2">
                <span class="text-md text-gray-600">Payment</span>
                <select 
                  name="payment_type" 
                  class="bg-inherit text-lg pl-8 py-2 w-full border-gray-500 border rounded-md" 
                >
                  <option value="" selected disabled>Select Prefered Payment</option>
                  <option value="gcash">GCash</option>
                  <option disabled value="paypal">PayPal</option>
                  <option disabled value="applepay">ApplePay</option>
                </select>
              </div>

              <div class="grid grid-cols-2 items-center gap-x-4 mt-1">
                <x-app.input 
                  type="date" 
                  label="Start Date" 
                  name="startdate"
                  class="text-[16px]"
                >
                  <x-slot name="errors">
                    @error('startdate')
                    <p class="text-red-500 text-sm error">{{$message}}</p>
                    @enderror
                  </x-slot>
                </x-app.input>

                <x-app.input 
                  type="date" 
                  label="End Date" 
                  name="enddate"
                  class="text-[16px]"
                >
                  <x-slot name="errors">
                    @error('enddate')
                    <p class="text-red-500 text-sm error">{{$message}}</p>
                    @enderror
                  </x-slot>
                </x-app.input>
              </div>

              <x-app.input 
                type="number" 
                label="Price Amount" 
                name="amount"
                placeholder="0.00"
                id="amount"
                oninput="calculate()"
                value="0.00"
              >
                <x-slot name="errors">
                  @error('amount')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>
            </div>
          </div>

          <div class="mt-20 flex items-center relative mr-0">
            <div class="mr-auto flex flex-col space-y-1 border-l-4 border-indigo-500 pl-6">
              <p class="text-base"><span class="font-medium text-indigo-500">
                NOTE</span>: Be minded that our system will commission for what's your price that's by <span class="text-red-500 font-medium">10%</span>
              </p>
              <p id="result"></p>
            </div>
            <div class="flex items-center space-x-4">
              <a 
                href="/contracts/list"
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

<!-- Add this in your Blade file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('input').click(function() {
      $('.error').hide();
  });
});

var checkboxes = document.querySelectorAll('input[name="schedule[]"]');

var selectedDaysParagraph = document.getElementById('selectedDays');

// Add change event listener to each checkbox
checkboxes.forEach(function(checkbox) {
  checkbox.addEventListener('change', function() {
    // Get all selected checkbox values
    var selectedDays = Array.from(document.querySelectorAll('input[name="schedule[]"]:checked')).map(function(checkbox) {
        return checkbox.value;
    });

    // Update the paragraph element with selected tags
    selectedDaysParagraph.innerText = 'days: ' + selectedDays.join(', ');
  });
});

function calculate() {
    var amountInput = document.getElementById('amount');
    var amount = parseFloat(amountInput.value);

    if (isNaN(amount)) {
        document.getElementById('result').innerHTML = 'Result: ';
        return;
    }

    var result = amount - (0.1 * amount);

    document.getElementById('result').innerHTML = 'Result: ' + result;
}

calculate();
</script>
