<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-red-600">DEBUG INFO</h1>
                    <p class="text-lg">Ingelogd als: <strong>{{ Auth::user()->name }}</strong></p>
                    <p class="text-lg">Email: <strong>{{ Auth::user()->email }}</strong></p>
                    <p class="text-lg">User ID: <strong>{{ Auth::id() }}</strong></p>
                    <p class="text-lg">Rol: <strong>{{ Auth::user()->role }}</strong></p>

                    <div class="mt-4">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
