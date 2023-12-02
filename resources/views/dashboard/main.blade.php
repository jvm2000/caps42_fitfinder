<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<x-layout>
    {{-- Title  --}}
    <x-slot:title>
        FitFinder - Dashboard
    </x-slot>
    <div class="w-full py-14 px-12 relative">
        <div class="flex items-center relative">
            <p class="text-3xl font-semibold mr-auto">Dashboard</p>
        </div>
        <div class="w-5 relative py-5 px-5">
            <a href="/requests/dashboard/coach" class="font-semibold mr-auto">Notification</a>
        </div>
        <div class="absolute top-10 right-12 z-20 flex space-x-4">
            <div class="flex items-center space-x-4">
                <div class="">
                    <x-notification-component />
                </div>
                <div>
                    <x-menu-dropdown />
                </div>
            </div>
        </div>
        {{-- Dashboard Tab  --}}
        <div class="mt-20 grid grid-cols-3 w-full">
            <div class="col-span-2 space-y-5">
                {{-- Rectangle 1 --}}
                <div class="rectangle rounded-2xl p-5 w-[40rem] h-25 bg-zinc-300 overflow-auto flex relative">
                    <h1 class="text-xl">
                        <p> Hi {{ auth()->user()->first_name }} </p>
                        <p> Welcome to FitFinder </p>
                    </h1>
                    <img src="/dashboard/fitness.svg" alt="Fitness Image"
                        class="ml-auto custom-svg absolute bottom-0 right-0">
                </div>

                {{-- Rectangle 3 --}}
                <div class="rectangle rounded-2xl p-5 w-[30rem] h-[230px] bg-zinc-300 overflow-auto flex flex-col">
                    <img src="/dashboard/prcnt1.svg" alt="Percent Image" class="ml-auto custom-svg fixed">

                </div>

                {{-- Rectangle 4 --}}
                <div class="rectangle rounded-2xl p-5 w-[38rem] h-[245px] bg-zinc-300 overflow-auto flex flex-col">
                    <img src="/dashboard/graph.svg" alt="Fitness Image" class="ml-auto custom-svg absolute">
                </div>

            </div>

            {{-- Rectangle 2 --}}
            <div class="col-span-1">
                <img src="/dashboard/person.svg" alt="Person Image" class="position w-[220px]">
                <div class="rectangle rounded-2xl p-5 w-[230px] h-[230px] bg-zinc-300">
                    <div class="text-center">
                        <h1 class="text-xl"> Ongoing Contracts </h1>
                        <div class="mt-5 space-y-3 text-left text-m">
                            <p> Trainee Sample </p>
                            <p> Trainee Sample 01</p>
                            <p>Trainee Sample 02</p>
                            <p>Trainee Sample 03</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

@if (session('message'))
	<x-app.toaster message="{{ session('message') }}">
	</x-app.toaster>
@endif
