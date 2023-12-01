<x-layout>
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
						class="relative px-10 group border-b-8 py-[22px] cursor-pointer border-indigo-400 tablinks"
					>
						<p class="text-xl font-semibold text-indigo-400">List</p>
					</button>
				</div>
				@if (auth()->user()->role === 'Coach')		
					<a 
						href="/contracts/make"
						type="submit"
						class="rounded-full flex items-center space-x-4 px-6 py-3 text-md text-white bg-black cursor-pointer w-auto">
						<img src="/icons/programs/plus.svg" class="w-6 h-6">
						<p class="whitespace-nowrap">Create</p>
					</a>
				@endif
				<div class="w-full border-t-8 absolute z-10 bottom-0"></div>
			</div>
		</div>

		{{-- Table  --}}
		<div class="mt-2">
			<div class="tabcontent">
				@if($contracts && count($contracts) > 0)
					<table class="w-full table-auto border-spacing-y-6 border-separate">
						<thead>
							<tr>
								<th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Program's Info</th>
								@if (auth()->user()->role === 'Coach')
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Trainee</th>
								@else
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Coach</th>
								@endif
								<th class="py-4">
									<p class="text-xl font-medium text-gray-400 py-4 text-left w-44">Status</p>
								</th>
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($contracts as $index => $pending)
								@if($pending->status === 'Pending')
									<tr class="">
										<td class="border-l-8 border-indigo-500 py-1">
											<div class="flex items-center space-x-4 pl-4">
												<div class="w-9 h-9 rounded-full">
													<img src="{{ $pending->program->getImageURL() }}" class="w-full h-full rounded-full">
												</div>
												<p class="text-sm">{{ $pending->program->name }}</p>
											</div>
										</td>
										
										<td class="py-1">
											<p class="text-sm text-ellipsis">{{$pending->trainee->first_name}} {{$pending->trainee->last_name}}</p>
										</td>
										<td class="py-2">
											<p class="text-sm">{{$pending->status}}</p>
										</td>
										
										<td class="py-2">
											<div class="flex items-center space-x-3 relative">
												<x-contracts.modal.preview :pending="$pending" :index="$index"/>
											</div>
										</td>
									</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				@else
					<p>No contracts made yet</p>
				@endif
			</div>
		</div>
	</div>
</x-layout>