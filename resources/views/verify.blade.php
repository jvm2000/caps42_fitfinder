<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> @vite('resources/css/app.css')

  <title>FitFinder - Verify your Account</title>

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
        <p class=" text-black text-center">
          <span class="text-4xl font-semibold">Verify your login</span><br>
          <span class="text-md font-light">Please input the code send into your gmail</span>
        </p>
      </div>
      <!-- Credentials Input -->
      <form method="post" action="{{ route('verify.login') }}">
        @csrf
        <div class="grid space-y-5 px-2 pt-8">
            <x-app.input 
                type="text" 
                label="Verification Code" 
                placeholder="Enter Verification Code" 
                name="verification_code"
            >
                <x-slot name="errors">
                @error('verification_code')
                <p class="text-red-500 text-sm error">{{$message}}</p>
                @enderror
                </x-slot>
          </x-app.input>

        <div class="pt-8 w-full grid items-center relative h-24">
          <button 
            type="submit"
            class="rounded-md text-center px-6 py-4 text-md text-white bg-black cursor-pointer w-full active:mt-1"
          >
            Verify
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