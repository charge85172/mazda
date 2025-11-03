@props(['active'])

@php
    // De classes zijn aangepast om de Mazda themakleuren te gebruiken.
    $classes = ($active ?? false)
                // Actieve link: rode onderrand en witte tekst (voor een donkere achtergrond).
                ? 'inline-flex items-center px-1 pt-1 border-b-2 border-mazda-red text-sm font-medium leading-5 text-white focus:outline-none focus:border-mazda-red transition duration-150 ease-in-out'
                // Inactieve link: grijze tekst die wit wordt bij hover.
                : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-mazda-gray hover:text-white hover:border-mazda-gray-dark focus:outline-none focus:text-white focus:border-mazda-gray-dark transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
