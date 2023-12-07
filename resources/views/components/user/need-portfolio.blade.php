<div class="fixed inset-0 bg-black/25 z-50 mx-auto">
  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-md bg-white rounded-xl absolute z-[9999]">
      <div class="px-8 pt-6 pb-4 space-y-8 grid place-items-center">
        <div class="text-center">
          <p class="text-3xl font-bold text-indigo-800">Welcome To FitFinder!</p>
          <p class="text-xl">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
        </div>

        @if(auth()->user()->role === 'Coach')
          <img src="/images/need-portfolio.png" alt="">
        @else 
          <img src="/images/need-med-trainee.png" alt="">
        @endif

        <div class="grid items-center">
          <p class="text-base text-center w-72">To start off, first you must upload and fill up your 
            @if(auth()->user()->role === 'Coach')
              portfolio.
            @else 
              profile
            @endif 
            <span class="font-medium text-indigo-500"></span>
          </p>
        </div>

        @if(auth()->user()->role === 'Coach')
          <a 
            class="rounded-md flex items-center px-6 py-3 text-md text-white bg-indigo-800 cursor-pointer active:mt-[1px]"
            href="/profile/coach/{{auth()->user()->id}}"
          >Go to Profile</a>
        @else
        <a 
          class="rounded-md flex items-center px-6 py-3 text-md text-white bg-indigo-800 cursor-pointer active:mt-[1px]"
          href="/profile/trainee/{{auth()->user()->id}}"
        >Go to Profile</a>
        @endif
      </div>
    </div>
  </div>
</div>
  