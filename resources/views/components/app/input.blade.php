@props([
  'label','id' => null,
  'oninput' => null,
  'placeholder' => null,
  'value' => null,
  'minlength' => null,
  'maxlength' => null,
  'disabled' => false,
  'name',
  'type',
])

<div class="space-y-2">
  <span class="text-md text-gray-600">{{ $label }}</span>
  <input 
    id="{{ $id }}"
    type="{{ $type }}" 
    {{ $attributes->merge(['class' => 'bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md', 'disabled' => $disabled]) }}
    placeholder="{{ $placeholder }}"
    name="{{ $name }}"
    value="{{ $value }}"
    minlength="{{ $minlength }}"
    maxlength="{{ $maxlength }}"
    oninput="{{ $oninput }}"
  />
  <div>
    {{ $errors }}
  </div>
</div>

<script>
$(document).ready(function() {
  $('input').click(function() {
      $('.error').hide();
  });
});
</script>