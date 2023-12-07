<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Setup Payment Account
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Setup Payment Account</p>
      <x-menu-dropdown />
    </div>

    <form action="/payment/create/{{ auth()->user()->id }}" method="POST">
      @csrf
      <div class="mt-24 w-full grid place-items-center">
        <div class="max-w-md w-full">
          <div class="flex flex-col">
            <div class="w-full text-center flex flex-col items-center pt-4 pb-6 space-y-3">
              <img src="/icons/general/gcash-icon.svg" alt="" class="w-24 h-24 rounded-xl">
              <p class="text-black text-2xl font-semibold">Setup GCash Account</p>
            </div>

            <div class="space-y-2">
              <x-app.input 
                type="text" 
                label="First Name" 
                name="first_name"
                placeholder="Enter First Name"
              >
                <x-slot name="errors">
                  @error('')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>

              <x-app.input 
                type="text" 
                label="Last Name" 
                name="last_name"
                placeholder="Enter Last Name"
              >
                <x-slot name="errors">
                  @error('')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>

              <x-app.input 
                type="text" 
                label="Mobile Number" 
                name="mobile_number"
                minlength="11"
                maxlength="11"
                placeholder="Enter Mobile Number"
              >
                <x-slot name="errors">
                  @error('')
                  <p class="text-red-500 text-sm error">{{$message}}</p>
                  @enderror
                </x-slot>
              </x-app.input>
            </div>

            <div class="mt-8 flex items-center relative mr-0">
              <div class="mr-auto"></div>
              <div class="flex items-center space-x-4">
                <a 
                  href="/home"
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

@if(session('message'))
  <x-app.toaster message="{{ session('message') }}">
  </x-app.toaster>
@endif