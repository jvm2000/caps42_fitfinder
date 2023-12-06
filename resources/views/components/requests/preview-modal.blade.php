<x-app.modal name="Preview Portfolio" class="max-w-xl mt-8">
  <x-slot name="button">
    <img 
      id="preview" width="100" 
      height="100" 
      class="w-full h-full z-40 cursor-pointer" src="{{ $user->portfolio->getPortfolioURL() }}" 
      title="Preview Portfolio"
    />
  </x-slot>
  <div class="px-4 py-6">
    <div class="w-full h-[44rem]">
      <img 
        id="preview"
        class="w-full h-full z-40" src="{{ $user->portfolio->getPortfolioURL() }}" 
      />
    </div>
  </div>
</x-app.modal>