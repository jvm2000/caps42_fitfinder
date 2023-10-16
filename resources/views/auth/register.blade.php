<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FitFinder - Register</title>
</head>
<body>
  <template>
    <div class="h-screen w-screen bg-white grid place-items-center overflow-hidden">
  
      <img src="/auth/bg.png" alt="Beautiful Background" class="w-full mt-60 z-20">
      <div class="max-w-lg w-full h-auto py-6 px-8 drop-shadow-xl rounded-lg bg-white font-inter z-30 fixed">
        <!-- Header -->
        <div class="text-black text-center">
          <p>
            <span class="text-4xl font-semibold">Signup to FitFinder</span><br>
            <span class="text-md font-light">Enter your necessary information.</span>
          </p>
        </div>
        <!-- Credentials Input -->
        <div class="grid space-y-5 px-2 pt-8">
          <!-- CSRF token  -->
          <div class="space-y-2">
            <p class="text-lg font-light">Email</p>
            <div class="relative w-full h-12 border-gray-500 border rounded-md bg-gray-100 flex place-items-center">
              <input 
                type="text" 
                class="bg-inherit text-lg px-6 ring-0 focus:right-0 border-none focus:border-non outline-none focus:outline-none appearance-none w-full" placeholder="Enter you Email"
                v-model="form.email"
              >
            </div>
          </div>
          <div class="space-y-2">
            <p class="text-lg font-light">Password</p>
            <div class="relative w-full h-12 border-gray-500 border rounded-md bg-gray-100 flex place-items-center">
              <input 
                class="bg-inherit text-lg px-6 ring-0 focus:right-0 border-none focus:border-non outline-none focus:outline-none appearance-none w-full" placeholder="Enter your Password"
                v-model="form.password"
              >
              <EyeSlashIcon 
                v-if="passHidden === 'password'"
                class="w-6 h-6 text-gray-500 absolute right-6 cursor-pointer"
              />
              <EyeIcon 
                v-if="passHidden === 'text'"
                class="w-6 h-6 text-gray-500 absolute right-6 cursor-pointer"
              />
            </div>
            <div v-if="form.password !== pass_confirm" class="text-md ml-2 text-red-400">Passwords does not match.</div>
          </div>
          <div class="space-y-2">
            <p class="text-lg font-light">Confirm Password</p>
            <div class="relative w-full h-12 border-gray-500 border rounded-md bg-gray-100 flex place-items-center">
              <input 
                class="bg-inherit text-lg px-6 ring-0 focus:right-0 border-none focus:border-non outline-none focus:outline-none appearance-none w-full" 
                placeholder="Re-enter your Password"
                v-model="pass_confirm"
              >
              <EyeSlashIcon 
                v-if="passHidden === 'password'"
                class="w-6 h-6 text-gray-500 absolute right-6 cursor-pointer"
              />
              <EyeIcon 
                v-if="passHidden === 'text'"
                class="w-6 h-6 text-gray-500 absolute right-6 cursor-pointer"
              />
            </div>
            <div v-if="form.password !== pass_confirm" class="text-md ml-2 text-red-400">Passwords does not match.</div>
          </div>
        </div>
        <div class="pt-12 w-full relative flex items-center h-28">
          <div class="flex place-items-center space-x-4 absolute right-0">
            <button 
              class="rounded-md text-center px-6 py-3 text-md text-gray-500 border border-gray-500 cursor-pointer"
            >
              Back
            </button>
            <button 
              class="rounded-md text-center px-6 py-3 text-md text-white bg-black cursor-pointer"
            >
              Signup
            </button>
          </div>
        </div>
      </div>
  
    </div>
  </template>
</body>
</html>