<x-admin-layout header="Payments">
    {{-- Title  --}}
    <x-slot:title>
        Admin - Payments
    </x-slot>

	<div class="flex items-center relative h-14">
		<div class="flex items-center mr-auto z-20 tab">
				<button id="myButton"
						class="relative px-6 group border-b-4 py-[14px] cursor-pointer border-indigo-400 tablinks">
						<p class="text-base font-semibold text-indigo-400">List</p>
				</button>
		</div>

		<div class="w-full border-t-4 absolute z-10 bottom-0"></div>
	</div>

	<div class="mt-2">
		<div class="tabcontent w-full">
			@if ($payments->count() > 0)
				<table class="w-full table-auto border-spacing-y-6 border-separate">
					<thead>
						<tr>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">ID</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Trainee</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Coach</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Program</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Payment Type</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Reference</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Amount</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Status</th>
							<th class="text-sm font-medium text-gray-400 py-4 text-left">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($payments as $index => $payment)
						<tr>       
							<td class="text-sm text-black py-4 text-left">{{ $payment->contract->id }}</td>
							<td class="text-sm text-black py-4 text-left">{{ $payment->contract->trainee->first_name }} {{ $payment->contract->trainee->last_name }} </td>
							<td class="text-sm text-black py-4 text-left">{{ $payment->contract->coach->first_name }} {{ $payment->contract->coach->last_name }}</td>
							<td class="text-sm text-black py-4 text-left">{{ $payment->contract->program->name }}</td>
							<td class="text-sm text-black py-4 text-left">
								<div class="flex items-center space-x-4">
									<p>{{ $payment->contract->payment_type }}</p>
									<x-admin.modal.preview-payment :index="$index" :payment="$payment"/>
								</div>
							</td>
							<td class="text-sm text-black py-4 text-left">{{ $payment->reference }}</td>
							<td class="text-sm text-black py-4 text-left">{{ $payment->amount }}</td>
							<td class="text-sm text-black py-4 text-left">{{ $payment->status }}</td>
							<td class="text-sm text-black py-4 text-left">
								@if ($payment->status === 'pending')
									<form action="/admin/payments/accept/{{ $payment->id }}" method="POST">
										@csrf
										<input type="hidden" name="temail" value="{{ $payment->contract->trainee->email }}">
										<input type="hidden" name="cemail" value="{{ $payment->contract->coach->email }}">
										<button type="submit">Accept Payment</button>
									</form>
								@else
									<form action="/admin/payments/enroll" method="POST">
										@csrf
										<input type="hidden" name="trainee_id" value="{{ $payment->contract->trainee->id }}">
										<input type="hidden" name="coach_id" value="{{ $payment->contract->coach->id }}">
										<input type="hidden" name="program_id" value="{{ $payment->contract->program->id }}">
										<button type="submit">Enroll</button>
									</form>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			@endif
		</div>
	</div>
</x-admin-layout>
