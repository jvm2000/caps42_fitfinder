<x-layout>
	<x-slot:title>
		FitFinder - Payments
	</x-slot>

	<div class="w-full py-10 px-12">
    <div class="flex items-center relative">
      <p class="text-3xl font-semibold mr-auto">Payments</p>
      <div class="flex items-center space-x-4">
				<div class="">
					@if(auth()->user()->role === 'Coach')
						<x-notification-component />
					@else
						<x-contract-pending-notification />
					@endif
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
			<div id="Active" class="tabcontent">
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
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Reference #</th>
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Amount</th>
								<th class="text-xl font-medium text-gray-400 py-4 text-left">Start/End Date</th>
								<th class="py-4 text-xl font-medium text-gray-400 text-left">Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($payments as $index => $payment)
								<tr class="">
									<td class="border-l-8 border-indigo-500 py-1">
										<div class="flex items-center space-x-4 pl-4">
											<div class="w-9 h-9 rounded-full">
												<img src="{{ $payment->contract->program->getImageURL() }}" class="w-full h-full rounded-full">
											</div>
											<p class="text-sm">{{ $payment->contract->program->name }}</p>
										</div>
									</td>
									@if(auth()->user()->role === 'Coach')
										<td class="py-1">
											<p class="text-sm text-ellipsis">{{$payment->contract->trainee->first_name}} {{$payment->contract->trainee->last_name}}</p>
										</td>
									@else
										<td class="py-1">
											<p class="text-sm text-ellipsis">{{$payment->contract->coach->first_name}} {{$payment->contract->coach->last_name}}</p>
										</td>
									@endif
									<td class="py-2 text-sm text-black">{{$payment->reference}}</td>
									<td class="py-2 text-sm text-black">{{$payment->amount}}</td>
									<td class="py-2 text-sm text-black">{{$payment->contract->startdate}} / {{$payment->contract->enddate}}</td>
									<td class="py-2">
										@if($payment->status === 'accepted')
											<div class="flex items-center space-x-4">
												<span class="w-2 h-2 bg-green-500 rounded-full"></span>
												<p class="text-sm text-green-500">accepted</p>
											</div>
										@else
											<div class="flex items-center space-x-4">
												<span class="w-2 h-2 bg-red-500 rounded-full"></span>
												<p class="text-sm text-red-500">pending</p>
											</div>
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<p>No payments made yet</p>
				@endif
			</div>
		</div>
	</div>
</x-layout>