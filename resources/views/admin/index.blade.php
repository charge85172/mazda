<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Overzicht van alle auto's ({{ $cars->count() }})</h3>

                    @if($cars->isEmpty())
                        <p>Er zijn nog geen auto's in het systeem.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border border-gray-300">
                                <thead>
                                <tr class="bg-gray-100">
                                    <th class="py-2 px-4 border-b text-left">Eigenaar</th>
                                    <th class="py-2 px-4 border-b text-left">Merk</th>
                                    <th class="py-2 px-4 border-b text-left">Model</th>
                                    <th class="py-2 px-4 border-b text-left">Bouwjaar</th>
                                    <th class="py-2 px-4 border-b text-left">Aangemaakt op</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $car)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">
                                            {{ $car->user->name ?? 'Onbekend' }}
                                            <span class="text-xs text-gray-500">({{ $car->user->email ?? '' }})</span>
                                        </td>
                                        <td class="py-2 px-4 border-b">{{ $car->make }}</td>
                                        <td class="py-2 px-4 border-b">{{ $car->model }}</td>
                                        <td class="py-2 px-4 border-b">{{ $car->year }}</td>
                                        <td class="py-2 px-4 border-b">{{ $car->created_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
