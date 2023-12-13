@props(['label'])

<div class="space-y-2 relative">
  <span class="text-md text-gray-600">{{ $label }}</span>
  <div id="dropdown-button" class="bg-inherit text-lg px-8 py-2 w-full flex items-center border-gray-500 border relative rounded-md cursor-default">
    {{ $data }}
    <img src="/icons/chevron-icon.svg" alt="" class="absolute right-4 w-5 h-5">
  </div>
  <div class="space-y-1">
    <div
      id="dropdown-menu"
      class="mt-4 w-full absolute rounded-b-md border-t shadow-lg hidden pt-0 pb-2 z-[9999] bg-white"
    >
      {{ $slot }}
    </div>
  </div>
</div>

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

var array = []
var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

for (var i = 0; i < checkboxes.length; i++) {
  array.push(checkboxes[i].value)
}
</script>