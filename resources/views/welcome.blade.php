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
                    <a href="#about" class="cursor-pointer no-underline font-regular text-sm text-white hover:text-cyan-300">About FitFinder</a>
                    <a href="#features" class="cursor-pointer no-underline font-regular text-sm text-white hover:text-cyan-300">Features</a>
                    <a href="#contact" class="cursor-pointer no-underline font-regular text-sm text-white hover:text-cyan-300">Contact Us</a>
                </div>
                <div class="flex place-items-center absolute space-x-12 right-[16rem]">
                    <div 
                    class="font-bold text-black text-sm bg-white rounded-md py-3 px-7 cursor-pointer"
                    >   
                        <p>Sign In</p>
                    </div>
                </div>
                </div>
                <!-- content 1 -->
                <div class="absolute mt-28 ml-72">
                <div class="space-y-6">
                    <p class="text-cyan-300 text-5xl font-extrabold">
                    FIND YOUR<br>
                    PERFECT FITNESS<br>
                    MATCH.
                    </p>
                    <p class="text-sm text-white w-[32rem]">Unlock your fitness potential with our revolutionary matchmaking platform, connecting you with like-minded individuals who share your goals and <br>passion for wellness. </p>
                </div>
                <div class="absolute mt-8">
                    <div class="font-bold px-10 py-3 text-black text-sm bg-white rounded-md cursor-pointer flex place-items-center space-x-2">
                    <p>Join Now</p>
                    <ArrowRightIcon class="w-4 h-4 text-black" />
                    </div>
                </div>
                </div>
                <img src="landingpage_character1.svg" alt="Landpage Character1" class="mt-[41px] right-[20rem] absolute">
        
            </div>
            
        </div>
    </body>
</html>
