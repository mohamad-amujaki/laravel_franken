@props([
    'amount',
])

{{ "Rp " . number_format($amount, 2, ',', '.') }}
