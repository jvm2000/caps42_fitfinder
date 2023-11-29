<x-layout>
  {{-- Title  --}}
  <x-slot:title>
    FitFinder - Contracts
  </x-slot>
  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Contracts</p>
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

				</div>

				<a 
					href="/contracts/make"
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
				@if($contracts && count($contracts) > 0)
					<table class="w-full table-auto border-spacing-y-6 border-separate">
						<thead>
							<tr>
								<th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Program's Name</th>
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Trainee</th>
								<th class="py-4">
									<p class="text-xl font-medium text-gray-400 py-4 text-left w-44">Status</p>
								</th>
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($contracts as $contract)
								<tr class="">
									<td class="border-l-8 border-indigo-500 py-1">
										<a href="" class="ml-4 flex items-center space-x-4 group">
											<img src="" class="w-9 h-9 rounded-full">
											<div class="text-left">
												<p class="text-black text-sm font-medium group-hover:text-indigo-400"></p>
												<p class="text-xs text-zinc-400">{{$contract->programs->name}}</p>
											</div>
										</a>
									</td>
									
									<td class="py-1">
										<p class="text-sm text-ellipsis">{{$contract->trainee->email}}</p>
									</td>
									<td class="py-2">
										<p class="text-sm">{{$contract->status}}</p>
									</td>
									
									<td class="py-2">
										<div class="flex items-center space-x-3 relative">
											<a href="" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
												<img src="/icons/programs/view.svg" alt="" class="w-4 h-4">
											</a>
		
											<a href="" class="w-7 h-7 rounded-full p-1.5 bg-indigo-500">
												<img src="/icons/programs/edit.svg" alt="" class="w-4 h-4">
											</a>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<p>No contracts made yet</p>
				@endif
			</div>
		</div>
  
  @if(session('message'))
    <x-app.toaster message="{{ session('message') }}">
    </x-app.toaster>
  @endif
</x-layout>