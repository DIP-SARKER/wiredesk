@props(['active' => false])

@php
    $baseClasses = 'block w-full px-4 py-2 text-start text-sm leading-5 transition duration-150 ease-in-out';

    $inactiveClasses = 'text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100';

    $activeClasses = 'text-indigo-700 bg-indigo-50 font-semibold focus:outline-none';

    $classes = $active ? "$baseClasses $activeClasses" : "$baseClasses $inactiveClasses";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
