@props(['label','placeholder','name','type'])

<div class="space-y-2">
  <span class="text-md text-gray-600">{{ $label }}</span>
  <input 
    type="{{ $type }}" 
    {{ $attributes->class(['bg-inherit text-lg px-8 py-2 w-full border-gray-500 border rounded-md']) }}
    placeholder="{{ $placeholder }}"
    name="{{ $name }}"
  />
  <div>
    {{ $errors }}
  </div>
</div>