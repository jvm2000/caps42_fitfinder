<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

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
</head>
<body>
  <div class="h-screen w-screen bg-white grid place-items-center overflow-hidden">

    <img src="/auth/bg.png" alt="Beautiful Background" class="w-full mt-60 z-20">
    <div class="max-w-lg w-full h-auto py-6 px-8 drop-shadow-xl rounded-lg bg-white font-inter z-30 fixed">
      <!-- Header -->
      <div class="grid place-items-center space-y-4">
        <p class=" text-black text-center">
          <span class="text-4xl font-semibold">Welcome to FitFinder</span><br>
          <span class="text-md font-light">Sign up your account</span>
        </p>
      </div>
      <!-- Credentials Input -->
      <form method="POST" action="/auth-register">
        @csrf
        <div class="grid space-y-4 px-2 pt-8">

          <div class="space-y-2">
            <span class="text-md text-gray-600">Username</span>
            <input 
              type="text" 
              class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md" 
              placeholder="Enter your Username"
              name="username"
            >
            @error('username')
            <p class="text-red-500 text-sm">{{$message}}</p>
            @enderror
          </div>
  
          <div class="space-y-2">
            <span class="text-md text-gray-600">Email</span>
            <input 
              type="email" 
              class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md" 
              placeholder="Enter your Email"
              name="email"
            >
            @error('email')
            <p class="text-red-500 text-sm">{{$message}}</p>
            @enderror
          </div>
  
          <div class="space-y-2">
            <span class="text-md text-gray-600">Password</span>
            <input 
              id="myInput"
              type="password" 
              class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md" 
              placeholder="Enter your Password"
              name="password"
            >
            @error('password')
            <p class="text-red-500 text-sm">{{$message}}</p>
            @enderror
          </div>
          {{-- <div class="flex items-center space-x-3 mt-0 mr-2">
            <input id="showPass" class="w-4 h-4" type="checkbox" onclick="myFunction()">
            <label for="showPass" class="text-sm text-black cursor-pointer">Show Password</label>
          </div> --}}

          <div class="space-y-2">
            <label class="text-base font-medium col-span-1 text-gray-600">Role</span></label>
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
  
        <div class="pt-8 w-full grid items-center relative space-y-4 ">
          <button 
            type="submit"
            class="rounded-md text-center px-6 py-4 text-md text-white bg-black cursor-pointer w-full"
          >Register</button>
          <a 
            href="/login"
            class="rounded-md text-center px-6 py-3 text-md text-black border border-black cursor-pointer w-full"
          >Back</a>
        </div>
        
      </form>
    </div>

  </div>
</body>
</html>