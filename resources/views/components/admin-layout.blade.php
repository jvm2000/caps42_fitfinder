@props(['header'])

<html lang="en">
  {{-- Loading  --}}
  @if(session('loading'))
    <x-app.loading />
  @endif

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> @vite('resources/css/app.css')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/svg" href="{{ asset('/icons/fitfinder-icon.svg') }}">

    <title>{{ $title ?? 'Admin' }}</title>
  </head>

  <div class="antialiased flex bg-[#f3f3f3]">
    <div class="h-screen w-80 bg-[#1A1A1A] overflow-hidden z-10 border-none py-10">
      <div class="flex items-center relative w-full px-14">
        <p class="text-2xl text-white mr-auto">Admin</p>
        <img src="/icons/admin/icon.svg" alt="Admin icon" class="w-7 h-7 mt-1">
      </div>

      <div class="flex flex-col mt-16">
        <a href="/admin/analytics" class="flex items-center py-4 mt-[1px] cursor-pointer">
          @if(Route::is('admin.dashboard'))
          <span class="h-[21px] w-1 bg-white rounded-r-md"></span>
          @endif
          <img src="/icons/admin/dashboard.svg" alt="Dashboard Icon" class="w-5 h-5 ml-12">
          <p class="text-base text-white ml-10">Dashboard</p>
        </a>
        <a href="/admin/trainees" class="flex items-center py-4 mt-[1px] cursor-pointer">
          @if(Route::is('admin.trainees'))
          <span class="h-[21px] w-1 bg-white rounded-r-md"></span>
          @endif
          <img src="/icons/admin/trainees.svg" alt="Trainees Icon" class="w-5 h-5 ml-12">
          <p class="text-base text-white ml-10">Trainees</p>
        </a>
        <a href="/admin/coaches" class="flex items-center py-4 mt-[1px] cursor-pointer">
          @if(Route::is('admin.coaches'))
          <span class="h-[21px] w-1 bg-white rounded-r-md"></span>
          @endif
          <img src="/icons/admin/coaches.svg" alt="Coaches Icon" class="w-5 h-5 ml-12">
          <p class="text-base text-white ml-10">Coaches</p>
        </a>
        <a href="/admin/payments" class="flex items-center py-4 mt-[1px] cursor-pointer">
          @if(Route::is('admin.payments'))
          <span class="h-[21px] w-1 bg-white rounded-r-md"></span>
          @endif
          <img src="/icons/admin/modules.svg" alt="Coaches Icon" class="w-5 h-5 ml-12">
          <p class="text-base text-white ml-10">Payments</p>
        </a>
      </div>
    </div>
    <div class="w-full px-20 py-10 relative">
      <div class="flex items-center relative w-full">
        <p class="text-2xl font-medium mr-auto">{{ $header }}</p>
        <div class="flex items-center space-x-4">
          <div class="w-6 h-6 rounded-full bg-gray-400"></div>
          <p class="text-sm">Admin001</p>
          <button 
            id="menu-button"
            aria-haspopup="true"
            aria-expanded="true" 
          >
            <img src="/icons/chevron-left-icon.svg" alt="Chevron Left" class="w-4 h-4 rotate-90">
          </button> 
          <div
            id="menu-dropdown"
            class="origin-top-right absolute right-0 mt-32 w-36 rounded-md shadow-lg hidden py-0 z-[9999] bg-white"
          >
            <form method="POST" action="/auth-logout">
              @csrf
              <button class="flex w-full items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100">
                <img src="/icons/settings/logout-icon.svg" alt="Gear Icon" class="w-4 h-4 ml-4">
                <p class="text-sm font-medium">Logout</p>
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="mt-8">
        {{$slot}}
      </div>
    </div>

  </div>
</html>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const dropdownButton = document.getElementById('menu-button');
    const dropdownMenu = document.getElementById('menu-dropdown');

    dropdownButton.addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');
    });

    // Close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
      if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
          dropdownMenu.classList.add('hidden');
      }
    });
  });
</script>