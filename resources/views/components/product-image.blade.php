@props([
    'image',
    'alt' => '',
    'class' => '',
])

<img src="{{ asset('/storage/products/'.$image) }}" alt="{{ $alt }}" class="{{ $class }}">
