<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mazda Fanpage</title>

    {{-- We laden dezelfde lettertypes en CSS als de rest van de applicatie voor een consistente look --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased font-sans">
{{-- Hoofdcontainer die het hele scherm vult en de content centreert --}}
<div class="bg-mazda-black min-h-screen flex flex-col items-center justify-center text-white p-6">

    {{-- Logo (optioneel, maar geeft een mooie touch) --}}
    <div class="mb-8">
        <svg class="w-32 h-32 text-mazda-red" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                  clip-rule="evenodd"></path>
        </svg>
    </div>

    {{-- Welkomstboodschap --}}
    <h1 class="text-5xl font-bold tracking-tight">
        Welkom!
    </h1>
    <p class="mt-2 text-lg text-mazda-gray">
        bij de officiële Mazda Fanpage.
    </p>

    {{-- Knoppen voor inloggen en registreren --}}
    <div class="mt-10 flex items-center justify-center gap-x-6">
        @if (Route::has('login'))
            <a href="{{ route('login') }}"
               class="rounded-md bg-mazda-red px-6 py-3 text-sm font-semibold text-white shadow-sm hover:opacity-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-mazda-red transition-opacity">
                Log In
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="rounded-md bg-mazda-gray-dark px-6 py-3 text-sm font-semibold text-white shadow-sm hover:opacity-80 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-mazda-gray-dark transition-opacity">
                    Register
                </a>
            @endif
        @endif
    </div>

</div>
</body>
</html>
