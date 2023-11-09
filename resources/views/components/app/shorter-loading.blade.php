<style>
  #container {
      display: none; /* Start with 0 opacity */
  }
  
  #container.show {
      display: block; /* Show the message with full opacity */
  }
  </style>
  
  <div id="container" class="bg-white absolute z-[9999] w-screen h-screen">
    <div class="relative">
      <div class="flex items-center h-full">
        <div class="grid place-items-center w-full animate-bounce">
          <img src="/empty/matchmake.svg" alt="Loading">
          loading...
        </div>
      </div>
    </div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Hide the message after 3 seconds
    $(document).ready(function(){
      setTimeout(function(){
          $("#container").addClass("show");
      }, 0); // Add a slight delay to allow smooth fade in
      setTimeout(function(){
          $("#container").removeClass("show");
      }, 1000); // Remove the class after 3 seconds for fade out
  });
  </script>