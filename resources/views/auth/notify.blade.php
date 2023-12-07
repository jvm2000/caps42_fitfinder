<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> @vite('resources/css/app.css')

  <title>FitFinder - Verify Account</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/svg" href="{{ asset('/icons/fitfinder-icon.svg') }}">
</head>

<body class="antialiased">
  <div class="h-screen w-screen bg-white grid place-items-center overflow-hidden">

    <img src="/auth/bg.png" alt="Beautiful Background" class="w-full mt-60 z-20">
    <div class="max-w-lg w-full h-auto py-6 px-8 drop-shadow-xl rounded-lg bg-white font-inter z-30 fixed">
      <!-- Header -->
      <div class="grid place-items-center space-y-4">
				<img src="/icons/general/warning-icon.svg" alt="Check Icon" class="w-16 h-16">
        <p class=" text-black text-center">
          <span class="text-3xl font-semibold text-red-500">Warning: Please Verify first</span><br>
          <span class="text-md font-normal">you cannot access this feature because you're not verified yet.</span>
        </p>

				<form method="POST" action="/email/verification-notification">
					@csrf
					<p class="text-md font-normal text-center">
						<span>Didn't receive any?</span><br>
						<span>
							click
							<button type="submit" class="appearance-none text-indigo-500 font-semibold">here</button>
							to resend verification
						</span>
					</p>
				</form>

				<a 
					href="/home"
					class="rounded-md text-center px-6 py-4 text-md text-white bg-red-500 cursor-pointer w-full active:mt-1"
				>Back</a>
      </div>
      
    </div>

  </div>

  @if(session('message'))
    <x-app.toaster message="{{ session('message') }}">
    </x-app.toaster>
  @endif
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Hide the error message when the input field with the name "name" is clicked
    $('input').click(function() {
        $('.error').hide();
    });
});
</script>
</html>