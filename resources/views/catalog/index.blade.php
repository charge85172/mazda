<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mazda Catalog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-6">Select a model from our catalog to add it to your personal collection.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($mazdaModels as $model)
                            <div class="border border-gray-200 rounded-lg p-4 flex flex-col justify-between">
                                <h3 class="text-lg font-bold">{{ $model['name'] }}</h3>
                                <div class="mt-4">
                                    <a href="{{ route('cars.create', ['model' => $model['name']]) }}"
                                       class="w-full text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Add to My Mazdas
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
