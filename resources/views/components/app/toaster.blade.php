@props(['message'])

<style>
#container {
    opacity: 0; /* Start with 0 opacity */
    height: auto; /* Start with 0 height */
    transition: opacity 0.5s ease-in-out, height 10s ease-in-out; /* Add transition for opacity and height */
}

#container.show {
    opacity: 1; /* Show the message with full opacity */
    height: auto; /* Automatically adjust height based on content */
}
</style>

<div 
  id="container"
  {{ $attributes->class(['fixed bottom-20 right-20 bg-white rounded-md shadow-lg py-4 pl-6 pr-10 z-[9999] border-l-4 border-green-400 flex items-center space-x-4']) }}
>
  <p class="text-lg text-black whitespace-nowrap">{{ $message }}</p>
  <div class="bg-green-400 w-6 h-6 rounded-full p-1">
    <img src="/icons/toaster-icon.svg" alt="Toaster" class="w-4 h-4">
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Hide the message after 3 seconds
  $(document).ready(function(){
    setTimeout(function(){
        $("#container").addClass("show");
    }, 50); // Add a slight delay to allow smooth fade in
    setTimeout(function(){
        $("#container").removeClass("show");
    }, 3000); // Remove the class after 3 seconds for fade out
});
</script>