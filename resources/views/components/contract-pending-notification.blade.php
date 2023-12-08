<div 
	id="notif-button"
	class="cursor-pointer mb-4 relative w-9 h-9"
>
  @if(auth()->user()->role === 'Trainee')
    <div class="absolute top-0 right-0">
      @if($requests->count() > 0)
        <div class="w-4 h-4 rounded-full bg-red-500 text-white grid place-items-center">
          <p class="text-[8px]">{{ $requests->count() }}</p>
        </div>
      @endif
    </div>
    <img src="/icons/notification.svg" alt="" class="w-full h-full">
  @endif
</div>

<div
	id="notif-dropdown"
	class="origin-top-right absolute right-0 mt-4 w-96 rounded-md shadow-lg hidden py-2 z-[9999] bg-white px-3"
>
    <p class="text-lg font-medium mb-4">Notifications</p>

    @foreach($requests as $request)
    <div class="flex flex-col space-y-5 pt-4 pb-2">
			<div class="flex items-center space-x-4 relative">
        <div class="w-10 h-10 rounded-full">
					<img src="{{ $request->trainee->getImageURL() }}" alt="" class="w-full h-full rounded-full">
        </div>

        <div class="flex flex-col space-y-0">
					<p class="text-base font-medium">{{ $request->trainee->first_name }} {{ $request->trainee->last_name }} / {{ $request->program->name }}</p>
					<p class="text-sm text-indigo-500">Trainee</p>
        </div>

				<form action="/contracts/remove/{{$request->id}}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('DELETE')
					<div class="flex items-center absolute right-0 bottom-2 space-x-3">
						<button class="w-6 h-6 rounded-full">
							<img src="/icons/requests/thumbs-down.svg" alt="" title="Decline">
						</button>
						<a href="/payments/create/{{ $request->id }}">
							<img src="/icons/requests/thumbs-up.svg" alt="" title="Accept" class="w-6 h-6 rounded-full">
						</a>
					</div>
				</form>
			</div>
    </div>
    @endforeach
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const notifButton = document.getElementById('notif-button');
    const notifMenu = document.getElementById('notif-dropdown');

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