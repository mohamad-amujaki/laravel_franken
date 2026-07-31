@props([
    'title',
    'backHref' => null,
])

<div class="flex items-center justify-between mb-6">
    <h4 class="text-lg font-semibold text-gray-900">{{ $title }}</h4>

    @if ($backHref)
        <a href="{{ $backHref }}"
           class="px-4 py-2 rounded-lg bg-gray-900 text-white text-sm font-semibold hover:bg-gray-800 transition">
            BACK
        </a>
    @endif
</div>
