<x-layout>
  <x-slot:title>
      FitFinder Dashboard
  </x-slot:title>

    <div class="w-full py-10 px-12">
      <div class="flex items-center relative">
        <p class="text-3xl font-semibold mr-auto"> Request </p>
        <x-menu-dropdown />
      </div>

      <div class="mt-20 flex flex-col space-y-10">
        <div class="flex items-center relative h-20">
          <div class="flex items-center mr-auto z-20 tab">
            <button 
              id="myButton"
              class="relative px-10 group border-b-8 py-[22px] cursor-pointer hover:border-indigo-400 tablinks" onclick="openTab(event, 'Active')"
            >
              <p class="text-xl font-semibold group-hover:text-indigo-400">Active</p>
            </button>
          <div class="w-full border-t-8 absolute z-10 bottom-0"></div>
        </div>
      </div>

      {{-- Table  --}}
		<div class="mt-2">
			<div id="Active" class="tabcontent">
				<table class="w-full table-auto border-spacing-y-6 border-separate">
					<thead>
						<tr>
							<th class="text-xl font-medium text-gray-400 py-4 text-left indent-5"> Name of Coach</th>
							<th class="text-xl font-medium text-gray-400 py-4 text-left"> Category </th>
							<th class="py-4">
								<p class="text-xl font-medium text-gray-400 py-4 text-left w-44"> Status </p>
							</th>
						
						</tr>
					</thead>
				</table>
			</div>


</x-layout>