@props(['label','placeholder' => null,'name','type','value' => null, 'disabled' => false])

<div class="space-y-2">
  <span class="text-md text-gray-600">{{ $label }}</span>
  <input 
    type="{{ $type }}" 
    {{ $attributes->merge(['class' => 'bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md', 'disabled' => $disabled]) }}
    placeholder="{{ $placeholder }}"
    name="{{ $name }}"
    value="{{ $value }}"
  />
  <div>
    {{ $errors }}
  </div>
</div>