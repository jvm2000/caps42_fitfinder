<script>
  document.addEventListener('DOMContentLoaded', function () {
    const notifButton = document.getElementById('notif-button');
    const notifMenu = document.getElementById('notif-menu');

    notifButton.addEventListener('click', function () {
        notifMenu.classList.toggle('hidden');
    });

    // Close the dropdown when clicking outside of it
    document.addEventListener('click', function (event) {
      if (!notifButton.contains(event.target) && !notifMenu.contains(event.target)) {
          notifMenu.classList.add('hidden');
      }
    });
  });
</script>

<div class="w-11 h-11 rounded-full relative p-1">
  <button 
    class="w-10 h-10"
    id="notif-button"
    aria-haspopup="true"
    aria-expanded="true"  
  >
    <img src="/icons/general/notification-icon.svg" alt="Notification" class="w-full h-full">
  </button>
</div>

<div
  id="notif-menu"
  class="absolute right-44 mt-14 w-40 rounded-md shadow-lg hidden py-2 z-[9999] bg-white"
>ss
</div>