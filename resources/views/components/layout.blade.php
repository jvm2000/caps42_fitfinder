<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <title>{{ $title ?? 'FitFinder' }}</title>
  </head>

  <body class="antialiased">
    <div class="w-screen h-screen grid grid-cols-8 bg-[#1A1A1A] overflow-hidden">

      <nav class="col-span-2 py-24">
        <div class="relative h-full max-h-[46rem] w-full">
          <div class="grid place-items-center">
            <img src="/dashboard/logo-sidebar.svg" alt="Sidebar Logo">
          </div>

          
          <div class="mt-36 w-full">
          <div class="flex items-center relative mt-14 group">
          <span class="w-2 h-9 rounded-r-md mr-[110px]"></span>
          <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Matchmake</p>
          </div>
          
            <a 
              class="flex items-center relative group"
              href="/logged-in/dashboard"
            >
            
              <span class="w-2 h-9 rounded-r-md mr-[110px]"></span>
              <img src="/dashboard/icons/main.svg" alt="Main" class="w-6 h-6 group-hover:mb-1 mr-14">
              <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Dashboard</p>
            </div>
            <div class="flex items-center relative mt-14 group">
              <span class="w-2 h-9 rounded-r-md mr-[110px]"></span>
              <img src="/dashboard/icons/programs.svg" alt="Main" class="w-6 h-6 mr-14 group-hover:mb-1">
              <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Programs</p>
            </div>
            <div class="flex items-center relative mt-14 group">
              <span class="w-2 h-9 rounded-r-md mr-[110px]"></span>
              <img src="/dashboard/icons/contracts.svg" alt="Main" class="w-6 h-6 mr-14 group-hover:mb-1">
              <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Contracts</p>
            </div>
          </div>
        
            
          <div class="absolute bottom-0">
            <a 
              class="flex items-center relative group"
              href="/logged-in/settings"
            >
              <span class="w-2 h-9 rounded-r-md mr-[110px]"></span>
              <img src="/dashboard/icons/settings.svg" alt="Main" class="w-8 h-8 group-hover:mb-1 mr-14">
              <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Settings</p>
            </a>
          </div>

        </div>
      </nav>

      <div class="col-span-6 py-10 pr-10">
        <div class="bg-white rounded-3xl h-full max-h-[54rem] overflow-hidden">
          <main>
          @yield('content')
          {{$slot}}
          </main>
        </div>
      </div>

    </div>
  </body>
</html>