<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Settings
  </x-slot>
  <div class="w-full py-10 px-12 overflow-y-auto h-full max-h-[54rem]">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Settings</p>
      <x-menu-dropdown />
    </div>
    <div class="w-full border-b-8 mt-4"></div>
    <div class="grid grid-cols-5 gap-x-16 py-12 w-full px-12">
      {{-- Left Panel --}}
      <div class="flex flex-col space-y-6 col-span-3">
        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">Username<span class="text-red-500 font-light">*</span></label>
          <input 
            type="text" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            placeholder="Enter Username"
            name="first_name"
          >
        </div>

        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">First Name<span class="text-red-500 font-light">*</span></label>
          <input 
            type="text" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            placeholder="Enter First Name"
            name="first_name"
          >
        </div>

        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">Last Name<span class="text-red-500 font-light">*</span></label>
          <input 
            type="text" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            placeholder="Enter Last Name"
            name="last_name"
          >
        </div>

        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">Phone Number<span class="text-red-500 font-light">*</span></label>
          <input 
            type="text" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            placeholder="Enter Phone Number"
            minlength="11"
            maxlength="11"
            name="phone_number"
          >
        </div>

        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">Birthdate<span class="text-red-500 font-light">*</span></label>
          <input 
            type="date" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            placeholder="MM/DD/YY"
            name="phone_number"
          >
        </div>

        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">Gender<span class="text-red-500 font-light">*</span></label>
          <select 
            type="text" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2 appearance-none" 
            name="gender"
          >
            <option value="" selected disabled>Enter Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        
      </div>
      {{-- Right Panel  --}}
      <div class="space-y-1 col-span-2 grid place-items-center">
        <div class="w-48 h-48 rounded-full border-4 border-gray-300 relative grid place-items-center">
          <img src="/icons/settings/upload-icon.svg" alt="Upload Icon" class="w-8 h-8">
        </div>
        <p class="text-sm font-semibold w-full text-center text-gray-400">Upload your Image</p>
      </div>
    </div>
    {{-- Navigation Panel  --}}
    <div class="mt-10 grid grid-cols-5 gap-x-16 px-12">
      {{-- Main Panel  --}}
      <div class="flex flex-col space-y-6 col-span-3">
        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">Old Password</span></label>
          <input 
            type="password" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            value="Admin1234"
            disabled
            name="password"
          >
        </div>
        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">New Password</span></label>
          <input 
            type="text" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            disabled
            name=""
          >
        </div>
        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">Confirm Password</span></label>
          <input 
            type="text" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            disabled
            name=""
          >
        </div>
          <div class="grid grid-cols-3 items-center">
            <label class="text-base font-medium col-span-1 text-gray-400">Role</span></label>
            <select 
              type="text" 
              class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2 appearance-none" 
              name="role"
            >
              <option value="" selected disabled>Enter Role</option>
              <option value="Coach">Coach</option>
              <option value="Trainee">Trainee</option>
            </select>
          </div>
      </div>

    </div>

    <div class="mt-20 grid grid-cols-5 gap-x-16 px-12">
      {{-- Main Panel  --}}
      <div class="flex flex-col space-y-6 col-span-3">
        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">Email</span></label>
          <input 
            type="email" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            name="email"
          >
        </div>
        <div class="grid grid-cols-3 items-center">
          <label class="text-base font-medium col-span-1 text-gray-400">Verification code</span></label>
          <input 
            type="text" 
            class="bg-inherit text-sm px-6 py-2 w-full border-gray-500 border rounded-md col-span-2" 
            name=""
          >
        </div>
      </div>

    </div>
  </div>
</x-layout>