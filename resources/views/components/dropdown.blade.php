<script>
  // dropdown.js

document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.querySelector('.custom-dropdown button');
    const dropdownMenu = document.querySelector('.custom-dropdown .dropdown-menu');

    dropdownButton.addEventListener('click', function(e) {
        e.preventDefault();
        dropdownMenu.classList.toggle('hidden');
    });

    // Close the dropdown when clicking outside of it
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
});

</script>

<!-- resources/views/components/custom-dropdown.blade.php -->

<div class="relative inline-block text-left">
  <div>
      <button class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring focus:border-blue-300 active:bg-gray-50 active:text-gray-800" id="options-menu" aria-haspopup="true" aria-expanded="true">
          Select an option
          <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M9.293 9.293a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 010-1.414z"></path>
          </svg>
      </button>
  </div>

  <div class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg">
      <div class="py-1 rounded-md bg-white shadow-xs">
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 1</a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 2</a>
          <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Option 3</a>
      </div>
  </div>
</div>


