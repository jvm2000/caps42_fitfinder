<script>
  document.addEventListener('DOMContentLoaded', function () {
    const dropdownButton = document.getElementById('dropdown-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

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
        <p class="text-base font-bold">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
        <p class="text-base text-neutral-400">{{auth()->user()->role}}</p>
    </div>
    <button 
      class="w-11 h-11 rounded-full border"
      id="dropdown-button"
      aria-haspopup="true"
      aria-expanded="true"  
    >
        <img src="{{auth()->user()->getImageURL()}}" alt="Sample Icon" class="rounded-full h-full w-auto">
    </button>
  </div>
  {{-- Dropdown Menu  --}}
  <form method="POST" action="/auth-logout">
    @csrf
    <div
      id="dropdown-menu"
      class="origin-top-right absolute right-0 mt-4 w-full rounded-md shadow-lg hidden py-2 z-[9999] bg-white"
    >
      <a 
        class="flex w-full items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100"
        href="/profile/{{auth()->user()->id}}"
      >
        <img src="/icons/settings/profile-icon.svg" alt="Profile Icon" class="w-6 h-6 ml-4">
        <p class="text-sm font-medium">Profile</p>
      </a>
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
