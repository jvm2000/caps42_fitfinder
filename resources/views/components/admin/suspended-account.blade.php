<div class="fixed inset-0 bg-black/25 z-50 mx-auto">
  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl font-medium">Account Suspended</p>
      </div>

      <div class="px-8 pt-6 pb-4 space-y-8">
        <p>Sorry but your account is suspended as of now.</p>

        <form method="POST" action="/auth-logout">
          @csrf
          <button class="flex items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100">
            <p class="text-sm font-medium">Logout</p>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
  