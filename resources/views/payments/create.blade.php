<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Create Payment
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Create Payment</p>
      <x-menu-dropdown />
    </div>

    <form action="/payments/generate/{{ $contract->id }}" method="POST">
      @csrf
      <input type="hidden" name="contract_id" value="{{ $contract->id }}">
      <input type="hidden" name="amount" value="{{ $contract->amount }}">
      <div class="mt-24 w-full grid place-items-center">
        <div class="max-w-md w-full">
          <div class="flex flex-col">
            <div class="flex flex-col space-y-2 relative border-b border-gray-500 pb-4">
              <div class="flex items-center space-x-4">
                <div class="w-24 h-24 rounded-full">
                  <img src="{{ $contract->program->getImageURL() }}" alt="" class="w-full h-full rounded-full">
                </div>

                <div class="flex flex-col">
                  <p class="text-2xl font-bold">{{ $contract->program->name }}</p>
                  <p class="text-base text-indigo-500">{{ $contract->program->summary }}</p>
                  <p class="text-sm mt-2">By: {{ $contract->coach->first_name }} {{ $contract->coach->last_name }} / {{ $contract->payment_type }}</p>
                </div>
              </div>
              <div class="absolute right-0 top-0">
                <div class="flex flex-col space-y-1">
                  <p class="text-green-500">start</p>
                  <p class="text-xs">{{ $contract->startdate }}</p>
                </div>

                <div class="flex flex-col space-y-1">
                  <p class="text-red-500">end</p>
                  <p class="text-xs">{{ $contract->enddate }}</p>
                </div>
              </div>
            </div>

            <div class="w-full text-center flex flex-col pt-4 pb-6">
              <p class="text-black text-2xl font-semibold">Amount to Pay</p>
              <p class="text-green-500 text-xl font-medium">P{{ $contract->amount }}.00</p>
            </div>

            

            <div class="space-y-2">
              <x-app.input 
                type="text" 
                label="Reference" 
                name="reference"
                placeholder="Enter Reference"
              >
                <x-slot name="errors">
                  @error('')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>
            </div>
            <div class="space-y-2">
                  <div>
                  <label for="image">Upload a image:</label>
                  <input type="file" id="image" name="image">
                  </div>
            </div>
            <div class="mt-8 flex items-center relative mr-0">
              <div class="mr-auto"></div>
              <div class="flex items-center space-x-4">
                <a 
                  href="/contracts/list"
                  class="rounded-md flex items-center px-6 py-3 text-sm text-black border-2 border-black cursor-pointer active:mt-[1px]"
                >
                  Cancel
                </a>
                <button 
                  type="submit"
                  class="rounded-md flex items-center px-6 py-3 text-sm text-white bg-black cursor-pointer active:mt-[1px]"
                >
                  Create
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</x-layout>