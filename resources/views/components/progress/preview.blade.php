<style>
  #preview-container {
    max-width: 400px;
    border: 1px solid #ccc;
    padding: 10px;
    margin: 20px;
  }
  #preview-container img {
    max-width: 100%;
    height: auto;
  }
</style>

<div class="cursor-pointer hover:text-indigo-500 hover:font-medium" onclick="openPreviewModal({{ $index }})">
  {{ $slot }}
</div>

<div id="previewModal_{{ $index }}" class="fixed inset-0 bg-black/25 z-50 hidden mx-auto">
  <div class="flex items-center justify-center h-full">
    <div class="w-full max-w-lg bg-white rounded-xl absolute z-[9999]">
      <div class="w-full relative flex items-center py-5 indent-6 border-b">
        <div class="flex items-center space-x-4">
          <p class="text-xl font-medium">About {{ $mod->module->name }}</p>
        </div>
        <button onclick="closePreviewModal({{ $index }})" class="absolute right-8 ">
          <img id="closeArchive" src="/icons/programs/close.svg" alt="" class="w-4 h-4cursor-pointer active:mt-1">
        </button>
      </div>
      {{-- Slot  --}}
      <div class="px-8 pt-6 relative h-[42rem] overflow-y-auto z-10">
        <div class="flex flex-col items-center absolute right-6 top-6">
          <button onclick="startStopwatch({{ $index }})" id="play-button_{{$index}}">
            <div class="w-16 h-16 rounded-full bg-green-500 grid place-items-center relative">
              <img src="/icons/progress/play.svg" alt="" class="w-10 h-10">
            </div>
          </button>

          <button onclick="stopStopwatch({{ $index }})" id="stop-button_{{$index}}" class="hidden">
            <div class="w-16 h-16 rounded-full bg-red-500 grid place-items-center relative">
              <div class="w-6 h-6 bg-white rounded-md"></div>
            </div>
          </button>
          <input type="text" id="stopwatch_{{ $index }}" value="00:00:00" readonly class="stopwatch-text text-sm w-20 text-center mt-2">
        </div>

        <div class="space-y-4">
          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">What to do?</p>
            <p class="text-base">{{ $mod->module->procedure }}</p>
          </div>

          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">How many sets and reps?</p>
            <p class="text-base">Do a {{ $mod->module->sets }} sets where it has {{ $mod->reps }} reps</p>
          </div>

          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">Be reminded that:</p>
            <p class="text-base">You should have a at lease a break about {{ $mod->module->rest_period }} minute/s</p>
          </div>

          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">What its difficulty?</p>
            <p class="text-base">{{ $mod->module->difficulty }}</p>
          </div>

          <div class="flex flex-col space-y-1">
            <p class="text-base font-medium">Note:</p>
            <p class="text-base">{{ $mod->module->notes }}</p>
          </div>
          <form action="/progress/update/{{$mod->id}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <input type="hidden" name="status" value="done">
            <input type="hidden" name="enrollee_id" value="{{$mod->id}}">

            <div class="flex flex-col space-y-1">
              <p class="text-base text-red-500">You may follow this video link for reference</p>
              <div class="mt-6">
                <iframe width="450" height="315" src="https://www.youtube.com/embed/{{$mod->module->video_url}}" frameborder="0" allowfullscreen></iframe>
              </div>
            </div>   
          </form>      
        </div>
      </div>

      <form action="/progress/update/{{$mod->id}}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <input type="hidden" name="status" value="done">
        <input type="hidden" name="enrollee_id" value="{{$enrollee->id}}">
        <input type="hidden" name="program_id" value="{{$enrollee->id}}">
        <div class="flex flex-col space-y-2 items-center sticky bottom-0 pt-6 pb-3 w-full bg-white z-20 px-8">
          <button 
            type="submit"
            class="rounded-md flex items-center px-6 py-3 text-base text-white bg-black cursor-pointer active:mt-[1px] w-full justify-center"
          >
            Mark as Done
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
var iframe = document.getElementById("myIframe");
let stopwatchInterval;
let seconds = 0;
let minutes = 0;
let hours = 0;

iframe.src = urlToEmbed;

function openPreviewModal(index){
  var previewModal = document.getElementById('previewModal_' + index);
  previewModal.style.display = 'block';
}

function closePreviewModal(index){
  var previewModal = document.getElementById('previewModal_' + index);
  previewModal.style.display = 'none';
}

function updateStopwatch(index) {
    seconds++;

    if (seconds === 60) {
        seconds = 0;
        minutes++;

        if (minutes === 60) {
            minutes = 0;
            hours++;
        }
    }

    const formattedTime = `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
    document.getElementById('stopwatch_' + index).value = formattedTime;
    
}

function startStopwatch(index) {
    document.getElementById('stopwatch_' + index).classList.add('text-red-500');
    var playButton = document.getElementById('play-button_' + index);
    var stopButton = document.getElementById('stop-button_' + index);
    stopwatchInterval = setInterval(function () {
        updateStopwatch(index);
    }, 1000);
    playButton.style.display = 'none';
    stopButton.style.display = 'block';

}

function stopStopwatch(index) {
    document.getElementById('stopwatch_' + index).classList.remove('text-red-500');
    var playButton = document.getElementById('play-button_' + index);
    var stopButton = document.getElementById('stop-button_' + index);
    clearInterval(stopwatchInterval);
    playButton.style.display = 'block';
    stopButton.style.display = 'none';
}

function pad(value) {
    return value < 10 ? `0${value}` : value;
}
</script>