<html lang="en">
  {{-- Loading  --}}
  @if(session('loading'))
    <x-app.loading />
  @endif

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
     @vite('resources/css/app.css')
   

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/svg" href="{{ asset('/icons/fitfinder-icon.svg') }}">

    <title>{{ $title ?? 'FitFinder' }}</title>
  </head>

  <div class="antialiased">
    <div class="w-screen h-screen grid sm:grid-cols-8 grid-cols-1 bg-[#1A1A1A] overflow-hidden z-10">

      <nav class="col-span-2 py-24 sm:block hidden">
        <div class="relative h-full w-full">
          <div class="sm:flex hidden flex-col items-center">
            <img src="/dashboard/logo-sidebar.svg" alt="Sidebar Logo">
          </div>

          <div class="mt-36 w-full sm:block hidden">
            <a href="/home" class="flex items-center relative group z-0">
              <span class="w-2 h-9 rounded-r-md mr-32 z-10"></span>
              @if(Route::is('home.index') )
                <span class="w-2 h-9 rounded-r-md mr-32 absolute bg-white"></span>
              @endif
              <img src="/icons/home.svg" alt="Main" class="w-7 h-7 group-hover:mb-1 mr-14">
              <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Dashboard</p>
            </a>

            @if (auth()->user()->role === 'Trainee')
            <a href="/matchmakes" class="flex items-center relative mt-8 group z-0">
              <span class="w-2 h-9 rounded-r-md mr-32 z-10"></span>
              @if(Route::is(['matchmaking.index', 'matchmaking.show']))
                <span class="w-2 h-9 rounded-r-md mr-32 absolute bg-white"></span>
              @endif
              <img src="/dashboard/icons/main.svg" alt="Main" class="w-6 h-6 group-hover:mb-1 mr-14">
              <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Matchmakes</p>
            </a>
            @endif

            @if (auth()->user()->role === 'Coach')
            <a href="/programs/list" class="flex items-center relative mt-8 group z-0">
              <span class="w-2 h-9 rounded-r-md mr-32 z-10"></span>
              @if(in_array(Route::currentRouteName(), ['programs.index', 'programs.make', 'modules.program.show', 'modules.make', 'modules.edit']))
                <span class="w-2 h-9 rounded-r-md mr-32 absolute bg-white"></span>
              @endif
              <img src="/dashboard/icons/barbell.svg" alt="Main" class="w-6 h-6 mr-14 group-hover:mb-1">
              <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Programs</p>
            </a>
            @endif

            @if (auth()->user()->role === 'Trainee')
              <a href="/progress/list" class="flex items-center relative mt-8 group z-0">
                <span class="w-2 h-9 rounded-r-md mr-32 z-10"></span>
                @if(Route::is(['trainee.progress', 'progress.modules']))
                  <span class="w-2 h-9 rounded-r-md mr-32 absolute bg-white"></span>
                @endif
                <img src="/dashboard/icons/barbell.svg" alt="Main" class="w-6 h-6 group-hover:mb-1 mr-14">
                <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Programs</p>
              </a>
            @endif
            
            <a href="/contracts/list"class="flex items-center relative mt-8 group">
                <span class="w-2 h-9 rounded-r-md mr-32 z-10"></span>
                @if(Route::is(['contracts.list']))
                  <span class="w-2 h-9 rounded-r-md mr-32 absolute bg-white"></span>
                @endif
              <img src="/dashboard/icons/contracts.svg" alt="Main" class="w-6 h-6 mr-14 group-hover:mb-1">
              <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Contracts</p>
            </a>

             <a href="/payments/list"class="flex items-center relative mt-8 group">
                <span class="w-2 h-9 rounded-r-md mr-32 z-10"></span>
                @if(Route::is(['payments.list']))
                  <span class="w-2 h-9 rounded-r-md mr-32 absolute bg-white"></span>
                @endif
                <img src="/dashboard/icons/payment.svg" alt="Main" class="w-6 h-6 mr-14 group-hover:mb-1">
                <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Payments</p>
              </a>
          </div>
          
        

          <div class="absolute bottom-0">
            <a href="/auth/profile/{{auth()->user()->id}}" class="flex items-center relative group">
              <span class="w-2 h-9 rounded-r-md mr-32 z-10"></span>
              @if(in_array(Route::currentRouteName(), ['user.show']))
                <span class="w-2 h-9 rounded-r-md mr-32 absolute bg-white"></span>
              @endif
              <img src="/dashboard/icons/settings.svg" alt="Main" class="w-8 h-8 group-hover:mb-1 mr-14">
              <p class="text-lg font-bold text-white group-hover:mb-1 cursor-pointer">Settings</p>
            </a>
            <a href="http://192.168.0.110/chatify">
              <div id="chatHead" class="bg-blue-500 text-white py-2 px-4 rounded-full fixed bottom-20 right-20">
                  Chat
              </div></a>
            </a>
          </div>
          
        </div>
      </nav>
      
      <div class="col-span-6 sm:py-10 py-0 sm:pr-10 pr-0">
        <div class="bg-white sm:rounded-3xl rounded-none h-full">
          <main class="sm:overflow-hidden overflow-y-auto sm:h-auto h-screen">
          @yield('content')
          {{$slot}}
          </main>
        </div>
      </div>

    </div>
  </div>

  @if(auth()->user()->status === 'suspended')
  <x-admin.suspended-account/>
  @endif

  @if(auth()->user()->status === 'deactivated')
  <x-admin.deactivated-account/>
  @endif
</html>