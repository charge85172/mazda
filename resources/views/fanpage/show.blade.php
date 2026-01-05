<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            My Garage
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($myCars as $car)
                    <div
                        class="bg-white dark:bg-mazda-black overflow-hidden shadow-sm sm:rounded-lg flex flex-col justify-between">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $car->model_name }}</h3>
                            <p class="text-mazda-gray-dark dark:text-mazda-gray">{{ $car->generation }}</p>
                            <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                <p>Year: {{ $car->year }}</p>
                                <p>Version: {{ $car->version }}</p>
                            </div>

                            {{-- Pivot Data --}}
                            @if ($car->pivot->is_project_car || $car->pivot->notes)
                                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-mazda-gray-dark">
                                    @if ($car->pivot->is_project_car)
                                        <span
                                            class="inline-block bg-mazda-red/10 text-mazda-red text-xs font-bold mr-2 px-2.5 py-1 rounded-full">
                                            Project Car
                                        </span>
                                    @endif
                                    @if ($car->pivot->notes)
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 italic">
                                            "{{ $car->pivot->notes }}"</p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        {{-- Remove Button --}}
                        <div class="p-6 pt-0">
                            <form method="POST" action="{{ route('garage.destroy', $car) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full justify-center inline-flex items-center px-4 py-2 bg-transparent border border-mazda-gray-dark rounded-md font-semibold text-xs text-gray-500 dark:text-gray-300 uppercase tracking-widest hover:bg-mazda-red hover:text-white hover:border-transparent transition ease-in-out duration-150">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white dark:bg-mazda-black shadow-sm sm:rounded-lg p-6">
                        <p class="text-center text-gray-500">
                            Your garage is empty. Go to the <a href="{{ route('cars.index') }}"
                                                               class="text-mazda-red hover:underline">car catalog</a> to
                            add some cars!
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
