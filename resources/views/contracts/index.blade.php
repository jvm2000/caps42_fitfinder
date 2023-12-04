<x-layout>
  <x-slot:title>
    FitFinder - Contracts
  </x-slot>

  <div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Contracts</p>
      <div class="flex items-center space-x-4">
				<div class="">
					<x-notification-component />
				</div>
				<div>
					<x-menu-dropdown />
				</div>
			</div>
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
							@foreach($contracts as $index => $contract)
								<tr class="">
									<td class="border-l-8 border-indigo-500 py-1">
										<div class="flex items-center space-x-4 pl-4">
											<div class="w-9 h-9 rounded-full">
												<img src="{{ $contract->program->getImageURL() }}" class="w-full h-full rounded-full">
											</div>
											<p class="text-sm">{{ $contract->program->name }}</p>
										</div>
									</td>
									
									<td class="py-1">
										<p class="text-sm text-ellipsis">{{$contract->trainee->first_name}} {{$contract->trainee->last_name}}</p>
									</td>
									<td class="py-2">
										<div class="flex items-center space-x-4">
											@if($contract->status === 'pending')
												<span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
												<p class="text-sm text-yellow-500">{{$contract->status}}</p>
											@else
												<span class="w-2 h-2 bg-green-500 rounded-full"></span>
												<p class="text-sm text-green-500">{{$contract->status}}</p>
											@endif
										</div>
									</td>
									
									<td class="py-2">
										<div class="flex items-center space-x-3 relative">
											<x-contracts.modal.preview :contract="$contract" :index="$index"/>
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
	</div>
</x-layout>

@if(session('message'))
	<x-app.toaster message="{{ session('message') }}">
	</x-app.toaster>
@endif