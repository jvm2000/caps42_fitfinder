<style>
  .requestModal {
    opacity: 0;
    display: none;
    transition: opacity 0.3s ease-in-out, display 0s linear 0.3s;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }
  .requestModal.active {
    opacity: 1;
    display: block;
    transition: opacity 0.3s ease-in-out, visibility 0s linear 0.3s;
  
  }
  </style>
  
  @props(['name'])
  
  <div id="openSendRequestModal">
    {{ $button }}
  </div>
  
  <!-- The Modal -->
  <div id="sendRequestModal" class="requestModal grid place-items-center w-screen h-screen">
    <!-- Modal content -->
    <div {{ $attributes->class(['w-full bg-white m-auto rounded-xl']) }}>
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <p class="text-xl font-medium">{{ $name }}</p>
        <img id="closeSendRequestModal" src="/icons/programs/close.svg" alt="" class="w-4 h-4 absolute right-8 cursor-pointer active:mt-1">
      </div>
      <div class="px-8 pt-6 pb-4">
        {{ $slot }}
      </div>
  
    </div>
  </div>
  
  <script>
  var requestModal = document.getElementById("sendRequestModal");
  
  var requestbtn = document.getElementById("openSendRequestModal");
  
  var closeRequest = document.getElementById("closeSendRequestModal");
  
  var cancelBtn = document.getElementById("cancel");
  
  var span = document.getElementsByClassName("closeSendRequestModal")[0];
  
  requestbtn.onclick = function() {
    requestModal.classList.add("active");
  }
  
  closeRequest.onclick = function() {
     requestModal.classList.remove("active");
  }
  
  cancelBtn.onclick = function() {
     requestModal.classList.remove("active");
  }
  
  success.onclick = function() {
    requestModal.classList.add("active");
  }
  
  window.onclick = function(event) {
    if (event.target == requestModal) {
      requestModal.classList.remove("active");
    }
  }
  </script>