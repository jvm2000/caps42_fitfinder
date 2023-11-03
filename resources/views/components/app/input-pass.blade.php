@props(['name','label'])

<div class="space-y-2">
  <span class="text-md text-gray-600">{{ $label }}</span>
  <div class="relative w-full flex items-center">
    <input 
      id="myInput"
      type="password" 
      class="bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md" 
      placeholder="Enter Password"
      name="{{ $name }}"
    >
    <img src="/auth/eye-icon.svg" alt="Pass not shown" class="absolute right-8 w-6 h-6 cursor-pointer eyeslashicon" onclick="myFunction()" id="pass-hidden-container">
    <img src="/auth/eye-slash-icon.svg" alt="Pass shown" class="absolute right-8 w-6 h-6 cursor-pointer eyeicon" onclick="myFunction()" id="pass-shown-container">
  </div>
  {{ $errors }}
</div>


<script>
var eyeslashicon = document.getElementById("pass-hidden-container");
var eyeicon = document.getElementById("pass-shown-container");

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
    eyeslashicon.style.display = "block";
    eyeicon.style.display = "none";
  } else {
    x.type = "password";
    eyeslashicon.style.display = "none";
    eyeicon.style.display = "block";
  }
}
</script>