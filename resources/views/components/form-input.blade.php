@props([
    'name',
    'label',
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
])

<div>
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-2">{{ $label }}</label>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
           value="{{ $value ?? old($name) }}"
           placeholder="{{ $placeholder }}"
           {{ $attributes->merge(['class' => 'w-full border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-200']) }}>

    @error($name)
        <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
    @enderror
</div>
