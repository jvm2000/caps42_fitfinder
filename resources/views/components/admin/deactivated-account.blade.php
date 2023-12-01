<div class="fixed inset-0 bg-black/25 z-50 mx-auto">
  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
      <form method="POST" action="/auth-logout">
        @csrf
        <div class="w-full relative flex items-center py-5 indent-6 border-b">
          <p class="text-xl font-medium">Account Deactivated</p>
          <button type="submit" class="flex items-center space-x-8 cursor-pointer py-2 hover:bg-gray-100 absolute right-6">
            <p class="text-sm font-medium">Logout</p>
          </button>
        </div>
      </form>
      <form method="POST" action="/auth/reactivate/{{auth()->user()->id}}" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="px-8 pt-6 pb-4 space-y-8">
          <p><span class="font-semibold">NOTE:</span> Sorry but your account is deactivated as of now. If you want to reactivate your account you may reactivate your account.</p>

          <div class="space-y-2">
            <span class="text-sm">type your <span class="font-semibold">"password"</span> in order to complete processing.</span>
            <input 
              id="inputText"
              name="password"
              type="password" 
              class="'bg-inherit text-md px-8 py-2 w-full border-gray-500 border rounded-md"
              autocomplete="off"
            />
          </div>

          <div class="flex items-center relative w-full">
            <div class="mr-auto"></div>
            <div class="flex items-center space-x-6">
              <div>
                  <input type="hidden" name="status" value="active">
                  <button type="submit" class="rounded-lg text-center px-6 py-3 text-sm text-white bg-blue-500 cursor-pointer disabled:bg-red-400 disabled:cursor-not-allowed">Reactivate</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>