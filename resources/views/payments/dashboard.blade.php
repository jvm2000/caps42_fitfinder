<x-layout>

	<x-slot:title>
				FitFinder - Payments
			</x-slot>
	<div class="flex w-10 px-y-1 space-y-5 ">
		@if(auth()->user()->role === 'Trainee')
	<a 
	 href="/payments/create"
	 type="submit"
	 class="rounded-full items-center space-x-4 px-6 py-3 text-md text-white bg-black cursor-pointer w-auto"
		>
	<p class="whitespace-nowrap">Create</p>
	</a> 
	</div>
	@endif
	{{-- Table  --}}
            <div class="mt-2">
                <div id="Active" class="tabcontent">
                    <table class="w-full table-auto border-spacing-y-6 border-separate">
                        <thead>
                            <tr>
                                <th class="text-xl font-medium text-gray-400 py-4 text-left indent-16">Contract Info</th>
                                <th class="text-xl font-medium text-gray-400 py-4 text-left">Coach Email</th>
                                <th class="py-4">
                                    <p class="text-xl font-medium text-gray-400 py-4 text-left w-44">Status</p>
                                </th>
                                <th class="text-xl font-medium text-gray-400 py-4 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
												@foreach ($payments as $payment)
															<tr class="">
																	<td class="border-l-8 border-indigo-500 py-1">
																			<a href="" class="ml-4 flex items-center space-x-4 group">
																					<img src="" class="w-9 h-9 rounded-full">
																					<div class="text-left">
																							<p class="text-black text-sm font-medium group-hover:text-indigo-400">{{$payment->contract->program->name}}</p>
																							<p class="text-xs text-zinc-400"></p>
																					</div>
																			</a>
																	</td>

																	<td class="py-1">
																		@if(auth()->user()->role === 'Trainee')
																			<p class="text-sm text-ellipsis">{{$payment->contract->coach->email}}</p>
																		@elseif(auth()->user()->role === 'Coach')
																		<p class="text-sm text-ellipsis">{{$payment->contract->trainee->email}}</p>
																		@endif
																	</td>

																	<td class="py-2">
																			@if($payment->status == 'accepted')
																					<p class="text-sm"><span class="text-green-500">{{$payment->status}}</span></p>
																			@elseif($payment->status == 'pending')
																					<p class="text-sm"><span class="text-red-500">{{$payment->status}}</span></p>
																			@endif
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
                </div>
    
</x-layout>