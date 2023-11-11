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

<div class="relative inline-block text-left">
  <div class="flex items-center space-x-4">
    <div class="text-right">
        <p class="text-base font-bold"><span>@</span>{{auth()->user()->username}}</p>
        <p class="text-base text-neutral-400">{{auth()->user()->role}}</p>
    </div>
    <button 
      class="w-11 h-11 rounded-full border"
      id="menu-button"
      aria-haspopup="true"
      aria-expanded="true"  
    >
        <img src="{{auth()->user()->getImageURL()}}" alt="Sample Icon" class="rounded-full h-full w-full">
    </button>
  </div>
  {{-- Dropdown Menu  --}}
  <form method="POST" action="/auth-logout">
    @csrf
    <div
      id="menu-dropdown"
      class="origin-top-right absolute right-0 mt-4 w-40 rounded-md shadow-lg hidden py-2 z-[9999] bg-white"
    >
      {{-- View Profile if Coach  --}}
      @if(auth()->user()->role === 'Coach')
      <a 
        class="flex w-full items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100"
        href="/profile/coach/{{auth()->user()->id}}"
      >
        <img src="/icons/settings/profile-icon.svg" alt="Profile Icon" class="w-6 h-6 ml-4">
        <p class="text-sm font-medium">Profile</p>
      </a>
      @endif

      {{-- View Profile if Trainee  --}}
      @if(auth()->user()->role === 'Trainee')
      <a 
        class="flex w-full items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100"
        href="/profile/trainee/{{auth()->user()->id}}"
      >
        <img src="/icons/settings/profile-icon.svg" alt="Profile Icon" class="w-6 h-6 ml-4">
        <p class="text-sm font-medium">Profile</p>
      </a>
      @endif
      <a 
        class="flex w-full items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100"
        href="/auth/profile/{{auth()->user()->id}}"
      >
        <img src="/icons/settings/gear-icon.svg" alt="Gear Icon" class="w-6 h-6 ml-4">
        <p class="text-sm font-medium">Settings</p>
      </a>

      <button class="flex w-full items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100">
        <img src="/icons/settings/logout-icon.svg" alt="Gear Icon" class="w-6 h-6 ml-4">
        <p class="text-sm font-medium">Logout</p>
      </button>
    </div>

  </form>
</div>
