<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> @vite('resources/css/app.css')
  
    <title>FitFinder - Register</title>
  
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
		<link rel="icon" type="image/svg" href="{{ asset('/icons/fitfinder-icon.svg') }}">
  </head>
  <body>
    <div class="h-screen w-screen bg-white grid place-items-center sm:overflow-hidden overflow-y-auto">
  
      <img src="/auth/bg.png" alt="Beautiful Background" class="w-full mt-60 z-20 sm:block hidden">
      <div class="max-w-5xl w-full h-auto sm:py-6 px-8 drop-shadow-xl rounded-lg bg-white font-inter z-30 sm:fixed block">
        <!-- Header -->
        <div class="grid place-items-center space-y-4 sm:mt-0 mt-8">
          <p class=" text-black text-center">
            <span class="text-4xl font-semibold">Welcome to FitFinder</span><br>
            <span class="text-md font-light">Sign up your account</span>
          </p>
        </div>
        <!-- Credentials Input -->
        <form method="POST" action="/auth-register">
          @csrf
          <div class="grid items-center sm:grid-cols-2 grid-cols-1 space-y-0 gap-y-4 px-2 pt-8 gap-x-14">
  
            <x-app.input 
              type="text" 
              label="First Name" 
              placeholder="Enter First Name" 
              name="first_name"
              value="{{ old('first_name') }}"
            >
              <x-slot name="errors">
                @error('first_name')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </x-slot>
            </x-app.input>

            <x-app.input 
              type="text" 
              label="Last Name" 
              placeholder="Enter Last Name" 
              name="last_name"
              value="{{ old('last_name') }}"
            >
              <x-slot name="errors">
                @error('last_name')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </x-slot>
            </x-app.input>
  
            <x-app.input 
              type="text" 
              label="Phone Number" 
              placeholder="Enter Phone Number" 
              name="phone_number"
              value="{{ old('phone_number') }}"
            >
              <x-slot name="errors">
                @error('phone_number')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </x-slot>
            </x-app.input>

            {{-- Custom Select Tag --}}
            <x-app.custom-select label="Tags">
              <x-slot name="data">
                <p class="text-lg capitalize text-ellipsis overflow-hidden" id="selectedTags"><span class="text-gray-400">Select Tags</span></p>
              </x-slot>

              @php
                  $options = [
                    0 => 'karate',
                    1 => 'taekwando',
                    2 => 'boxing',
                    4 => 'muay thai',
                    5 => 'strength training',
                    6 => 'weight training',
                    7 => 'pilates',
                    8 => 'body building',
                  ];
              @endphp

              @foreach ($options as $value)
              <label for="{{ $value }}" class="flex items-center space-x-2 indent-5 hover:bg-gray-200 py-1 cursor-pointer relative w-full pr-10">
                <p class="text-lg text-black font-norma capitalize mr-auto">{{ $value }}</p>
                <input id="{{ $value }}" name="tags[]" type="checkbox" class="w-4 h-4" value="{{ $value }}">
              </label>
              @endforeach

              <x-slot name="input">
                <p class="text-lg" id="checkboxValue"></p>
              </x-slot>
            </x-app.custom-select>

            <div class="space-y-2">
              <label class="text-md text-gray-600">Gender</label>
              <select 
                type="text" 
                class="bg-inherit text-lg px-6 py-2 w-full border-gray-500 border rounded-md col-span-2 appearance-none" 
                name="gender"
              >
                <option value="" selected disabled>Enter Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
  
            <x-app.input 
              type="date" 
              label="Birthdate" 
              name="birthdate"
              placeholder=""
            >
              <x-slot name="errors">
                @error('birthdate')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </x-slot>
            </x-app.input>
  
            <x-app.input 
              type="text" 
              label="Username" 
              placeholder="Enter Username" 
              name="username"
              value="{{ old('username') }}"
            >
              <x-slot name="errors">
                @error('username')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </x-slot>
            </x-app.input>
    
            <x-app.input 
              type="email" 
              label="Email" 
              placeholder="Enter Email" 
              name="email"
              value="{{ old('email') }}"
            >
              <x-slot name="errors">
                @error('email')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </x-slot>
            </x-app.input>
    
            <x-app.input-pass name="password" label="Password">
              <x-slot name="errors">
                @error('password')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
              </x-slot>
            </x-app.input-pass>
  
            <div class="space-y-2">
              <label class="text-md text-gray-600">Role</span></label>
              <select 
                type="text" 
                class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md appearance-none" 
                name="role"
              >
                <option value="" selected disabled>Enter Role</option>
                <option value="Coach">Coach</option>
                <option value="Trainee">Trainee</option>
              </select>
            </div>
        </div>
  
        <div class="pt-8 w-full flex items-center relative">
          <div class="mr-auto"></div>
          <div class="flex items-center space-x-4">
            <a 
              href="/login"
              class="rounded-md text-center px-6 py-3 text-md text-black border border-black cursor-pointer w-full"
            >Back</a>
            <button 
              type="submit"
              class="rounded-md text-center px-6 py-3 text-md text-white bg-black cursor-pointer w-full"
            >Register</button>
          </div>
        </div>
        
      </form>
    </div>

  </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('input').click(function() {
      $('.error').hide();
  });
});

var checkboxes = document.querySelectorAll('input[name="tags[]"]');

var selectedTagsParagraph = document.getElementById('selectedTags');

// Add change event listener to each checkbox
checkboxes.forEach(function(checkbox) {
  checkbox.addEventListener('change', function() {
    // Get all selected checkbox values
    var selectedTags = Array.from(document.querySelectorAll('input[name="tags[]"]:checked')).map(function(checkbox) {
        return checkbox.value;
    });

    // Update the paragraph element with selected tags
    selectedTagsParagraph.innerText = 'tags: ' + selectedTags.join(', ');
  });
});
</script>
</html>