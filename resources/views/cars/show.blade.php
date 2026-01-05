<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mazda Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">{{ $car->make }} {{ $car->model }}
                        ({{ $car->year }})</h3>

                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700">Make:</p>
                        <p class="mt-1 text-gray-900">{{ $car->make }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700">Model:</p>
                        <p class="mt-1 text-gray-900">{{ $car->model }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700">Year:</p>
                        <p class="mt-1 text-gray-900">{{ $car->year }}</p>
                    </div>

                    @if ($car->generation)
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-700">Generation:</p>
                            <p class="mt-1 text-gray-900">{{ $car->generation }}</p>
                        </div>
                    @endif

                    @if ($car->version)
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-700">Version:</p>
                            <p class="mt-1 text-gray-900">{{ $car->version }}</p>
                        </div>
                    @endif

                    <div class="mb-4">
                        <p class="text-sm font-medium text-gray-700">Status:</p>
                        <p class="mt-1 text-gray-900">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $car->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $car->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('cars.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Back to My Mazdas
                        </a>
                        <a href="{{ route('cars.edit', $car) }}"
                           class="ml-3 inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Edit Mazda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
