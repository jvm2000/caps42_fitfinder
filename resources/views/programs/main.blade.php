<style>
.tab button {
  background-color: inherit;
}

.tab button.active {
  border-color: #6366F1; 
	color: #6366F1; 
}
</style>

<script>
 window.onload = function() {
	// Find the element by its ID
	var button = document.getElementById('myButton');

	// Check if the element exists
	if (button) {
			// Programmatically trigger the click event
			button.click();
	}
};

function openTab(evt, tabName) {
	var i, tabcontent, tablinks;
	
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(tabName).style.display = "block";
	evt.currentTarget.className += " active";
}
</script>

<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Programs
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Programs</p>
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

					<button
						class="relative px-10 justify-center border-b-8 group py-[22px] cursor-pointer hover:border-indigo-400 tablinks" 
						onclick="openTab(event, 'Archive')"
					>
						<p class="text-xl font-medium group-hover:text-indigo-400">Archive</p>
					</button>
				</div>

				<a 
					href="/programs/make"
					type="submit"
					class="rounded-full flex items-center space-x-4 px-6 py-3 text-md text-white bg-black cursor-pointer w-auto"
				>
					<img src="/icons/programs/plus.svg" class="w-6 h-6">
					<p class="whitespace-nowrap">Create</p>
				</a>

				<div class="w-full border-t-8 absolute z-10 bottom-0"></div>

			</div>
		</div>

			{{-- Table  --}}
		<div class="mt-2">
			<div id="Active" class="tabcontent">
				<table class="w-full table-auto border-spacing-y-6 border-separate">
					<thead>
						<tr>
							<th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Program's Info</th>
							<th class="text-xl font-medium text-gray-400 py-4 text-left">Summary</th>
							<th class="py-4">
								<p class="text-xl font-medium text-gray-400 py-4 text-left w-44">Number of Trainees Enrolled</p>
							</th>
							<th class="text-xl font-medium text-gray-400 py-4 text-left">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($programs as $index => $active)
							@if($active->status === 'active')
							<tr class="">
								<td class="border-l-8 border-indigo-500 py-1">
									<a href="/programs/show/{{ $active->id }}" class="ml-4 flex items-center space-x-4 group">
										<img src="{{$active->getImageURL()}}" class="w-9 h-9 rounded-full">
										<div class="text-left">
											<div class="flex items-center space-x-4">
												<p class="text-black text-sm font-medium group-hover:text-indigo-400">{{$active->name}}</p>
												<div class="px-2 py-0 rounded-full
												@if ($active->prerequisite)
														bg-indigo-200 border border-dashed border-indigo-800 text-indigo-800
												@else
														bg-red-200 border border-dashed border-red-800 text-red-800
												@endif
												text-xs">
												{{ $active->prerequisite ? $active->prerequisite->name : 'No Prerequisite' }}
												</div>
											</div>
											<p class="text-xs text-zinc-400">{{$active->category}}</p>
										</div>
									</a>
								</td>

								<td class="py-1">
									<p class="text-sm text-ellipsis">{{$active->summary}}</p>
								</td>
								<td class="py-2">
									<p class="text-sm">
										<span class="text-red-500">0</span>
										 / @if($active->no_of_trainees === null) <span class="text-indigo-500">No limit</span> 
										 @else <span class="text-blue-400">{{$active->no_of_trainees}}</span> @endif

										</p>
								</td>

								<td class="py-2">
									<div class="flex items-center space-x-3 relative">
										<a href="/programs/show/{{ $active->id }}" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
											<img src="/icons/programs/view.svg" alt="" class="w-4 h-4">
										</a>

										<a href="/programs/edit/{{ $active->id }}" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
											<img src="/icons/programs/edit.svg" alt="" class="w-4 h-4">
										</a>

										{{-- Archive  --}}
										<x-programs.modal.archive :active="$active" :index="$index" />

									</div>
								</td>
							</tr>
							
							@endif
							
						@endforeach
					</tbody>
					{{$programs->links()}}
				</table>
			</div>

			<div id="Archive" class="tabcontent">
				<table class="w-full table-auto border-spacing-y-6 border-separate">
					<thead>
						<tr>
							<th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Program's Info</th>
							<th class="text-xl font-medium text-gray-400 py-4 text-left w-64">Summary</th>
							<th class="py-4">
								<p class="text-xl font-medium text-gray-400 py-4 text-left">Achived at</p>
							</th>
							<th class="text-xl font-medium text-gray-400 py-4 text-left">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($programs as $index => $archived)
							@if($archived->status === 'archive')
							<tr class="">
								<td class="border-l-8 border-indigo-500 py-1">
									<div class="ml-4 flex items-center space-x-4">
										<img src="{{$archived->getImageURL()}}" class="w-9 h-9 rounded-full">
										<div class="text-left">
											<p class="text-black text-sm font-medium">{{$archived->name}}</p>
											<p class="text-xs text-zinc-400">{{$archived->category}}</p>
										</div>
									</div>
								</td>

								<td class="py-1">
									<p class="text-sm text-ellipsis">{{$archived->summary}}</p>
								</td>
								<td class="py-2">
									<p class="text-sm"><span class="text-red-500">10</span> / 30</p>
								</td>

								<td class="py-2">
									<div class="flex items-center space-x-3 relative">
										
										{{-- Modals  --}}
										<x-programs.modal.archive-modals :archived="$archived" :index="$index"/>
									</div>
								</td>
							</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
  </div>


  
  @if(session('message'))
    <x-app.toaster message="{{ session('message') }}">
    </x-app.toaster>
  @endif
</x-layout>