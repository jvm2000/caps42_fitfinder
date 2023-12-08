<x-layout>
	{{-- Title  --}}
	<x-slot:title>
			FitFinder - Dashboard
	</x-slot>

	<div class="w-full py-10 px-12">
		<div class="flex items-center relative">
			<p class="text-3xl font-semibold mr-auto"></p>
			<div class="flex items-center space-x-4">
				<div class="">
					<x-notification-component />
				</div>
				<div>
					<x-menu-dropdown />
				</div>
			</div>
		</div>

		<div class="mt-8 px-8">
			<div class="grid grid-cols-2 gap-x-6">
				<div class="flex flex-col space-y-12">
					<div class="space-y-2">
						<p class="text-3xl text-indigo-500 font-semibold">Hi {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
						<p class="text-xl font-semibold">Welcome to FitFinder Matchmaking System</p>
					</div>

					<div class="space-y-4">
						<p class="text-2xl text-indigo-500 font-semibold">Available Features (FitFinder v1.0)</p>
						<div class="grid grid-cols-2 gap-x-6">
							<div class="space-y-1">
								<div class="flex items-center space-x-4">
									<span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
									<p class="text-base capitalize">Find a coach or trainee</p>
								</div>

								<div class="flex items-center space-x-4">
									<span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
									<p class="text-base capitalize">View coach or Trainee Profile</p>
								</div>

								<div class="flex items-center space-x-4">
									<span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
									<p class="text-base capitalize">Setup a Contract</p>
								</div>
							</div>

							<div class="space-y-1">
								<div class="flex items-center space-x-4">
									<span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
									<p class="text-base capitalize">Provide coach modules</p>
								</div>

								<div class="flex items-center space-x-4">
									<span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
									<p class="text-base capitalize">Manage Trainee Progress</p>
								</div>

								<div class="flex items-center space-x-4">
									<span class="w-2 h-2 bg-indigo-500 rounded-full"></span>
									<p class="text-base capitalize">View Total Earnings</p>
								</div>
							</div>
						</div>
					</div>

					<div class="space-y-4">
						<p class="text-2xl text-indigo-500 font-semibold">Features Coming Soon</p>
						<p class="text-base">Exciting features, tailored to enhance the coaching experience for both coaches and trainees, are on the horizon, promising a more dynamic and personalized interaction on our website.</p>
						<div class="space-y-1">
							<div class="flex items-center space-x-4">
								<span class="w-2 h-2 bg-gray-500 rounded-full"></span>
								<p class="text-base capitalize text-gray-500">Realtime Online Coaching</p>
							</div>
						</div>
					</div>
				</div>

				<div class="h-[44rem] w-full relative">
					<img src="/images/dashboard.png" alt="">
					<img src="/images/dashboard-2.png" alt="" class="w-96 h-96 absolute bottom-8">
					<img src="/images/dashboard-3.png" alt="" class="w-44 h-44 absolute bottom-8 right-0">
				</div>
			</div>
		</div>
	</div>
</x-layout>

@if (session('message'))
	<x-app.toaster message="{{ session('message') }}">
	</x-app.toaster>
@endif

@if(auth()->user()->role === 'Coach')
    @if(!auth()->user()->portfolio)
    <x-user.need-portfolio/>
    @endif
@endif

@if(auth()->user()->role === 'Trainee')
    @if(!auth()->user()->medcert)
    <x-user.need-portfolio/>
    @endif
@endif