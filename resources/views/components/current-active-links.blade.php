@props(['active'])

@php
$classes = ($active ?? false)
            ? 'group flex items-center rounded-md bg-gray-900 px-2 py-2 text-sm font-medium text-white'
            : 'group flex items-center rounded-md px-2 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
