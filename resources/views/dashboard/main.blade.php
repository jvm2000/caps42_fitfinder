<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    Dashboard
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Dashboard</p>
      <x-menu-dropdown />
    </div>
  </div>
</x-layout>