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
  <div class="w-11 h-11 rounded-full relative border-none">
    <div class="absolute right-0 top-0">
      @if (auth()->user()->hasVerifiedEmail())
      <img src="/dashboard/icons/verified.svg" alt="Verified" class="w-4 h-4 inline" title="Verified">
      @endif
    </div>

    <button 
      class="w-10 h-10 rounded-full border"
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
      class="origin-top-right absolute right-0 mt-4 w-64 rounded-md shadow-lg hidden py-2 z-[9999] bg-white"
    >
      @if(auth()->user()->role === 'Coach')
      <a 
        class="flex items-center space-x-6 py-2 w-full pl-3"
        href="/profile/coach/{{auth()->user()->id}}"
      >
        <div class="w-8 h-8 rounded-full relative">
          <img src="{{auth()->user()->getImageURL()}}" alt="Sample Icon" class="rounded-full h-full w-full">
        </div>
        <div class="">
          <div class="flex items-center space-x-4">
            <p class="text-base font-semibold">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
            <p class="text-xs text-blue-500">{{ auth()->user()->role }}</p>
          </div>
          <div class="flex items-center space-x-8">
            <p class="text-xs">{{auth()->user()->email}}</p>
          </div>
        </div>
      </a>
      @endif

      @if(auth()->user()->role === 'Trainee')
      <a 
        class="flex items-center space-x-6 py-2 w-full pl-3"
        href="/profile/trainee/{{auth()->user()->id}}"
        title="View Profile"
      >
        <div class="w-8 h-8 rounded-full relative">
          <img src="{{auth()->user()->getImageURL()}}" alt="Sample Icon" class="rounded-full h-full w-full">
        </div>
        <div class="">
          <div class="flex items-center space-x-4">
            <p class="text-base font-semibold">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
            <p class="text-xs text-blue-500"><span>@</span>{{ auth()->user()->role }}</p>
          </div>
          <div class="flex items-center space-x-8">
            <p class="text-xs">{{auth()->user()->email}}</p>
          </div>
        </div>
      </a>
      @endif

      <div class="px-4 border-t pt-2 pb-1">
        <a 
          class="flex w-full items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100"
          href="/payment/create"
        >
          <img src="/icons/settings/payment-icon.svg" alt="Gear Icon" class="w-6 h-6">
          <p class="text-sm font-medium">Setup Payment</p>
        </a>

        <a 
          class="flex w-full items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100"
          href="/auth/profile/{{auth()->user()->id}}"
        >
          <img src="/icons/settings/gear-icon.svg" alt="Gear Icon" class="w-6 h-6">
          <p class="text-sm font-medium">Settings</p>
        </a>

        <button class="flex w-full items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100">
          <img src="/icons/settings/logout-icon.svg" alt="Gear Icon" class="w-6 h-6">
          <p class="text-sm font-medium">Logout</p>
        </button>
      </div>
    </div>

  </form>
</div>
