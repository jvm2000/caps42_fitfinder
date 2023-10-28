<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> @vite('resources/css/app.css')

		<title>Welcome to FitFinder</title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

</head>

<body class="antialiased">
		<div class="h-full w-full overflow-y-auto relative">
				<!-- container -->
				<div class="w-full h-[634px] bg-gradient-to-b from-black to-gray-900 sticky top-0">
						<!-- navbar -->
						<div class="w-full h-[71px] bg-inherit bg-opacity-80 top-0 relative grid place-items-center">
								<img src="logo_white.svg" alt="Logo White" class="absolute left-[18rem]">
								<div class="flex place-items-center space-x-20 ">
										<a href="#about"
												class="cursor-pointer no-underline font-regular text-sm text-white hover:text-cyan-300">About
												FitFinder</a>
										<a href="#features"
												class="cursor-pointer no-underline font-regular text-sm text-white hover:text-cyan-300">Features</a>
										<a href="#contact"
												class="cursor-pointer no-underline font-regular text-sm text-white hover:text-cyan-300">Contact
												Us</a>
								</div>
								<a href="/login" class="flex place-items-center absolute space-x-12 right-[16rem]">
										<div class="font-bold text-black text-sm bg-white rounded-md py-3 px-7 cursor-pointer">
												<span class="outline-none">Sign In</span>
										</div>
								</a>
						</div>
						<!-- content 1 -->
						<div class="absolute mt-28 ml-72">
								<div class="space-y-6">
										<p class="text-cyan-300 text-5xl font-extrabold">
												FIND YOUR<br>
												PERFECT FITNESS<br>
												MATCH.
										</p>
										<p class="text-sm text-white w-[32rem]">Unlock your fitness potential with our revolutionary
												matchmaking platform, connecting you with like-minded individuals who share your goals and
												<br>passion for wellness. </p>
								</div>
								<div class="absolute mt-8">
										<div
												class="font-bold px-10 py-3 text-black text-sm bg-white rounded-md cursor-pointer flex place-items-center space-x-2">
												<p>Join Now</p>
												<ArrowRightIcon class="w-4 h-4 text-black" />
										</div>
								</div>
						</div>
						<img src="landingpage_character1.svg" alt="Landpage Character1" class="mt-[41px] right-[20rem] absolute">

				</div>
				<!-- about Fitfinder -->
				<div class="w-full h-auto py-20 grid place-items-center" id="about">
						<div class="flex place-items-center space-x-32">
								<img src="landingpage_character2.svg" alt="Landpage Character2">
								<div class="grid space-y-6">
										<p class="text-4xl font-bold">About FitFinder</p>
										<p class="text-base text-gray-800 font-normal">Elevate your training experience with our advanced
												matchmaking<br> platform, connecting trainees with expert coaches who will guide<br> and empower
												them to achieve their fitness goals.</p>
										<div class="flex place-items-center space-x-10">
												<img src="/icons/about/matchmaking.svg" alt="">
												<div class="w-[30rem] h-auto space-y-4">
														<p class="text-2xl text-sky-400 font-medium">Exclusive Matchmaking</p>
														<p class="text-base text-gray-600 font-normal">FitFinder helps users easily match with their
																preferred coach or trainee.</p>
												</div>
										</div>
										<div class="flex place-items-center space-x-10">
												<img src="/icons/about/userexperience.svg" alt="">
												<div class="w-[30rem] h-auto space-y-4">
														<p class="text-2xl text-sky-400 font-medium">Best User Experience</p>
														<p class="text-base text-gray-600 font-normal">FitFinder strives to provide an exceptional
																platform for coaches and trainees to connect seamlessly.</p>
												</div>
										</div>
										<div class="flex place-items-center space-x-10">
												<img src="/icons/about/mobile.svg" alt="">
												<div class="w-[30rem] h-auto space-y-4">
														<p class="text-2xl text-sky-400 font-medium">Mobile Friendly</p>
														<p class="text-base text-gray-600 font-normal">FitFinder offers a user-friendly platform,
																ensuring a seamless and enjoyable experience for all users.</p>
												</div>
										</div>
								</div>
						</div>
				</div>
				<!-- FitFinder Features -->
				<div class="w-full h-auto pt-20 pb-96 grid place-items-center" id="features">
						<div class="w-full grid place-items-center">
								<p class="text-4xl font-bold">All Features</p>
								<p class="mt-10 text-center text-lg font-normal">Fitfinder provides a comprehensive set of features,
										allowing users to effortlessly find coaches or <br>trainees, view detailed profiles, set up
										contracts, access coach modules, track trainee progress, and<br> engage in real-time online
										teaching.</p>
								<div class="pt-32 grid grid-cols-3 gap-36">
										<div
												class="w-[297px] h-[268px] grid place-items-center relative bg-gradient-to-b from-cyan-300 to white rounded-xl ">
												<div class="top-4 absolute text-xl font-bold w-[12.5rem] text-center">FIND A COACH OR TRAINEE
												</div>
												<img src="/icons/features/find-coach.svg" alt="All Features Icons">
												<div class="bottom-8 absolute text-sm font-bold flex place-items-center space-x-2">
														<p class="cursor-pointer">Learn more</p>
														<ArrowRightIcon class="w-3 h-3" />
												</div>
										</div>
										<div
												class="w-[297px] h-[268px] grid place-items-center relative bg-gradient-to-b from-cyan-300 to white rounded-xl ">
												<div class="top-4 absolute text-xl font-bold w-[12.5rem] text-center">VIEW COACH OR TRAINEE
														PROFILE</div>
												<img src="/icons/features/view-coach.svg" alt="All Features Icons">
												<div class="bottom-8 absolute text-sm font-bold flex place-items-center space-x-2">
														<p class="cursor-pointer">Learn more</p>
														<ArrowRightIcon class="w-3 h-3" />
												</div>
										</div>
										<div
												class="w-[297px] h-[268px] grid place-items-center relative bg-gradient-to-b from-cyan-300 to white rounded-xl ">
												<div class="top-4 absolute text-xl font-bold w-[12.5rem] text-center">SETUP A CONTRACT</div>
												<img src="/icons/features/setup-contract.svg" alt="All Features Icons">
												<div class="bottom-8 absolute text-sm font-bold flex place-items-center space-x-2">
														<p class="cursor-pointer">Learn more</p>
														<ArrowRightIcon class="w-3 h-3" />
												</div>
										</div>
										<div
												class="w-[297px] h-[268px] grid place-items-center relative bg-gradient-to-b from-cyan-300 to white rounded-xl ">
												<div class="top-4 absolute text-xl font-bold w-[12.5rem] text-center">PROVIDE COACH MODULES
												</div>
												<img src="/icons/features/provide-modules.svg" alt="All Features Icons">
												<div class="bottom-8 absolute text-sm font-bold flex place-items-center space-x-2">
														<p class="cursor-pointer">Learn more</p>
														<ArrowRightIcon class="w-3 h-3" />
												</div>
										</div>
										<div
												class="w-[297px] h-[268px] grid place-items-center relative bg-gradient-to-b from-cyan-300 to white rounded-xl ">
												<div class="top-4 absolute text-xl font-bold w-[12.5rem] text-center">MANAGE TRAINEES PROGREES
												</div>
												<img src="/icons/features/manage-progress.svg" alt="All Features Icons">
												<div class="bottom-8 absolute text-sm font-bold flex place-items-center space-x-2">
														<p class="cursor-pointer">Learn more</p>
														<ArrowRightIcon class="w-3 h-3" />
												</div>
										</div>
										<div
												class="w-[297px] h-[268px] grid place-items-center relative bg-gradient-to-b from-cyan-300 to white rounded-xl ">
												<div class="top-4 absolute text-xl font-bold w-[12.5rem] text-center">REALTIME ONLINE COACHING
												</div>
												<img src="/icons/features/realtime-coaching.svg" alt="All Features Icons">
												<div class="bottom-8 absolute text-sm font-bold flex place-items-center space-x-2">
														<p class="cursor-pointer">Learn more</p>
														<ArrowRightIcon class="w-3 h-3" />
												</div>
										</div>
								</div>
						</div>
						<!-- Contact Us -->
						<div class="w-full h-48 bg-black space-y-10 absolute bottom-0">
								<div class="relative px-80 mt-12">
										<img src="fitfinder-footer.svg" alt="Footer Logo">
										<div class="text-sm absolute right-80 bottom-2 flex place-items-center space-x-20 text-gray-300">
												<p class="cursor-pointer">Privacy Policy</p>
												<p class="cursor-pointer">Terms & Conditions</p>
										</div>
								</div>
								<div class="w-full border-t border-gray-600 py-2">
										<div class="pl-80 text-gray-300 text-sm font-extralight">
												@ 2023 FitFinder Coach and Trainee Matchmaking System, All rights reserved.
										</div>
								</div>
						</div>
				</div>
</body>

</html>
