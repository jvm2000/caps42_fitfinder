<x-layout>
    {{-- Title  --}}
    <x-slot:title>
        FitFinder - Profile
    </x-slot>
    <div class="w-full py-10 px-12 h-full max-h-[54rem] overflow-hidden">
        <div class="flex items-center relative space-x-4">
            <div class="flex items-center space-x-4 mr-auto">
                <a href="/matchmakes">
                    <img src="/icons/chevron-left-icon.svg" alt="View Profile" class="w-6 h-6 rotate-180">
                </a>
                <p class="text-3xl font-semibold mr-auto">Profile</p>
            </div>
            <x-menu-dropdown />
        </div>

        <div class="py-7 flex items-center justify-between relative w-full border-b-8">
            <div class="flex items-center space-x-6">
                <img src="{{ url('storage/' . $user->image) }}" alt="Profile" class="w-36 h-36 rounded-full">


                <div class="space-y-1">
                    <div class="flex items-center space-x-2">
                        <img src="/icons/settings/profile-icon.svg" alt="Profile Icon" class="w-6 h-6">
                        <p class="text-base font-medium">{{ $user->username }}</p>
                    </div>

                    <p class="text-3xl font-semibold">{{ $user->first_name }} {{ $user->last_name }}</p>
                    <p class="text-2xl font-medium text-indigo-500">{{ $user->role }}</p>
                </div>
            </div>

            <div class="grid grid-cols-4 items-center gap-x-6 gap-y-5">
                <div class="space-y-1 col-span-1">
                    <p class="text-base font-semibold">Gender:</p>
                    <p class="text-base font-normal">{{ $user->gender }}</p>
                </div>

                <div class="space-y-1 col-span-2 pl-2">
                    <p class="text-base font-semibold">Phone Number:</p>
                    <p class="text-base font-normal">{{ $user->phone_number }}</p>
                </div>

                <div class="space-y-1 col-span-1 text-center">
                    <p class="text-base font-semibold">Age</p>
                    <p class="text-base font-normal">{{ $user->getAgeAttribute() }}</p>
                </div>

                <div class="space-y-1 col-span-4">
                    <p class="text-base font-semibold">Tags</p>
                    <div class="flex items-center space-x-2">
                        @foreach ($user->tags as $tag)
                            <p class="text-base font-normal capitalize">{{ $tag }},</p>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        @if ($user->portfolio)
        <div class="mt-8 w-full px-8 display" id="displayForm">
            <div class="grid grid-cols-3 items-start gap-x-4">
                <div class="flex flex-col">
                    <div class="flex items-center space-x-5">
                        <p class="text-2xl font-semibold">Porfolio</p>
                    </div>

                    <div class="mt-10 flex flex-col space-y-5">
                        <div class="space-y-2">
                            <span class="text-md text-gray-600 font-semibold">Description</span>
                            <div
                                class="bg-inherit text-base px-8 py-2 h-32 w-full border-gray-500 border-b resize-none">
                                {{ $user->portfolio->description }}
                            </div>
                        </div>

                        <div class="space-y-2">
                            <span class="text-md text-gray-600 font-semibold">Recent Works</span>
                            <div class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border-b">
                                {{ $user->portfolio->recent_works }}
                            </div>
                        </div>

                        <div class="space-y-2">
                            <span class="text-md text-gray-600 font-semibold">What are some of your hobbies?</span>
                            <div class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border-b">
                                {{ $user->portfolio->hobbies }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-start">
                    <div class="flex items-center space-x-5">
                        <p class="text-2xl font-semibold">Portfolio</p>
                    </div>
                    <div class="mt-10 flex items-center space-x-8">
                        <div class="w-64 h-[350px] border"></div>
                    </div>
                </div>

                <div class="flex flex-col items-start">
                    <div class="flex items-center space-x-5">
                        <p class="text-2xl font-semibold">Programs</p>
                    </div>
                    <div class="mt-10 flex flex-col">
                        @foreach($user->programs as $program)
                        <div class="py-2 border-t border-b flex flex-col ">
                            <div class="flex items-center space-x-6">
                                <div class="flex items-center space-x-4">
                                    <div class="w-6 h-6 rounded-full relative">
                                        <img class="w-full h-full rounded-full" src="{{ $program->getImageURL() }}" alt="">
                                    </div>
                                    <p class="text-lg font-medium">{{ $program->name }}</p>
                                </div>
                                <div class="px-2 py-0 rounded-full
                                @if ($program->prerequisite)
                                bg-indigo-200 border border-dashed border-indigo-800 text-indigo-800
                                @else
                                bg-red-200 border border-dashed border-red-800 text-red-800
                                @endif
                                text-xs">
                                {{ $program->prerequisite ? $program->prerequisite->name : 'No Prerequisite' }}
                                </div>
                            </div>

                            <div class="grid grid-cols-4 items-center pl-10 mt-4">
                                <div class="flex flex-col col-span-3 space-y-1">
                                    <p class="text-xs text-neutral-950">{{ $program->summary }}</p>
                                    <p class="text-xs text-gray-600">{{ $program->category }}</p>
                                </div>
                                <p class="flex items-center space-x-2 text-xs">
                                    Number of Modules:
                                    
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($user->medcert)
            <div class="mt-8 w-full grid place-items-center display" id="displayForm">
                <div class="grid grid-cols-2 items-start gap-x-8">
                    <div class="flex flex-col">
                        <div class="flex items-center space-x-5">
                            <p class="text-2xl font-semibold">Medical Certificate</p>
                        </div>

                        <div class="mt-10 flex flex-col space-y-5">
                            <div class="space-y-2">
                                <span class="text-md text-gray-600 font-semibold">Description</span>
                                <div
                                    class="bg-inherit text-base px-8 py-2 h-32 w-full border-gray-500 border-b resize-none">
                                    {{ $user->medcert->description }}
                                </div>
                            </div>

                            <div class="space-y-2">
                                <span class="text-md text-gray-600 font-semibold">Med Cert application status</span>
                                <div class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border-b">
                                    {{ $user->medcert->status }}
                                </div>
                            </div>

                            <div class="space-y-2">
                                <span class="text-md text-gray-600 font-semibold">Started Fitness at</span>
                                <div class="bg-inherit text-base px-8 py-2 w-full border-gray-500 border-b">
                                    {{ $user->medcert->started_fitness }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-start">
                        <div class="flex items-center space-x-5">
                            <p class="text-2xl font-semibold">Upload Resume / Application Form</p>
                            <button>
                                <img src="/icons/portfolio/upload-icon.svg" alt="Upload Icon" class="w-5 h-5">
                            </button>
                        </div>
                        <div class="mt-10 flex items-center space-x-8">
                            <div class="w-64 h-[350px] border"></div>
                        </div>
                    </div>

                </div>
            </div>
        @endif

        {{-- Request  --}}
        <div class="mt-8 flex items-center relative w-full">
            <div class="mr-auto"></div>
            <x-requests.send-modal :user="$user" :programs="$user->programs" />
        </div>
    </div>
	</div>

	@if(session('message'))
    <x-app.toaster message="{{ session('message') }}">
    </x-app.toaster>
  @endif
</x-layout>