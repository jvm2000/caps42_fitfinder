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
            >
            @error('email')
            <p class="text-red-500 text-sm">{{$message}}</p>
            @enderror
          </div>
          <div class="space-y-2">
            <input 
              type="password" 
              class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md" 
              placeholder="Password"
              name="password"
            >
            @error('password')
            <p class="text-red-500 text-sm">{{$message}}</p>
            @enderror
          </div>
        </div>
        <!-- Sign Up -->
        <div class="pt-6 pl-2">
          <p class="font-normal text-md">
            No Account yet?<br>
            Click <a class="font-semibold text-indigo-500 cursor-pointer" href="/register">here</a> to join us today.
          </p>
        </div>

        <div class="pt-8 w-full grid items-center relative h-24">
          <button 
            type="submit"
            class="rounded-md text-center px-6 py-4 text-md text-white bg-black cursor-pointer w-full"
          >
            Login
          </button>
        </div>
      </form>  
    </div>

  </div>
</body>
</html>