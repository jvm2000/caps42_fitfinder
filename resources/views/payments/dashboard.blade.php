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
</x-layout>