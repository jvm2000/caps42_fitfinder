<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> @vite('resources/css/app.css')

  <title>FitFinder - Login</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
</head>

<body class="antialiased">
  <div class="h-screen w-screen bg-white grid place-items-center overflow-hidden">

    <img src="/auth/bg.png" alt="Beautiful Background" class="w-full mt-60 z-20">
    <div class="max-w-lg w-full h-auto py-6 px-8 drop-shadow-xl rounded-lg bg-white font-inter z-30 fixed">
      <!-- Header -->
      <div class="grid place-items-center space-y-4">
        <img src="/auth/fitfinder-black.svg" alt="Logo Black">
        <p class=" text-black text-center">
          <span class="text-4xl font-semibold">Welcome to FitFinder</span><br>
          <span class="text-md font-light">where trainee and coaches meet</span>
        </p>
      </div>
      <!-- Credentials Input -->
      <form method="POST" action="/auth-login">
        @csrf
        <div class="grid space-y-5 px-2 pt-8">
          <div class="space-y-2">
            <input 
              type="email" 
              class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md" 
              placeholder="Email"
              name="email"
              value="{{ old('email') }}"
            >
            @error('email')
            <p class="text-red-500 text-sm error">{{$message}}</p>
            @enderror
          </div>
          
          <x-app.input-pass name="password" label="">
            <x-slot name="errors">
              @error('password')
              <p class="text-red-500 text-sm error">{{$message}}</p>
              @enderror
            </x-slot>
          </x-app.input-pass>

        </div>
        <!-- Sign Up -->
        <div class="pt-6 pl-2 flex items-start relative">
          <div class="font-normal text-md space-y-0 mr-auto">
            <p>No Account Yet?</p>
            <p>Click <a class="font-semibold text-indigo-500 cursor-pointer" href="/register">here</a> to join us today.</p>
          </div>
        </div>

        <div class="pt-8 w-full grid items-center relative h-24">
          <button 
            type="submit"
            class="rounded-md text-center px-6 py-4 text-md text-white bg-black cursor-pointer w-full active:mt-1"
          >
            Login
          </button>
        </div>

      </form>  
    </div>

  </div>

  @if(session('message'))
    <x-app.toaster message="{{ session('message') }}">
    </x-app.toaster>
  @endif
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Hide the error message when the input field with the name "name" is clicked
    $('input').click(function() {
        $('.error').hide();
    });
});
</script>
</html>