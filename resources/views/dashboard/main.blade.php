<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Dashboard
  </x-slot>
  <div class="w-full py-14 px-12 relative">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Dashboard</p>
    </div>
    <div class="absolute top-10 right-12 z-20">
      <x-menu-dropdown />
    </div>
    {{-- Dashboard Tab  --}}
  </div>
</x-layout>  