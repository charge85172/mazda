@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                             role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                             role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    <h2 class="text-2xl font-bold mt-8 mb-4">Your Cars</h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                            <tr>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">
                                    Make
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">
                                    Model
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">
                                    Year
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">
                                    Color
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">
                                    Status
                                </th>
                                <th class="py-2 px-4 border-b border-gray-200 text-left text-sm font-semibold text-gray-600">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($userCars as $car)
                                <tr>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $car->make }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $car->model }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $car->year }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $car->color }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">{{ $car->status }}</td>
                                    <td class="py-2 px-4 border-b border-gray-200">
                                        <form action="{{ route('cars.updateStatus') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_car_id" value="{{ $car->id }}">
                                            <select name="status" onchange="this.form.submit()"
                                                    class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                <option
                                                    value="to_drive" {{ $car->status == 'to_drive' ? 'selected' : '' }}>
                                                    To Drive
                                                </option>
                                                <option
                                                    value="driving" {{ $car->status == 'driving' ? 'selected' : '' }}>
                                                    Driving
                                                </option>
                                                <option value="driven" {{ $car->status == 'driven' ? 'selected' : '' }}>
                                                    Driven
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-4 px-4 text-center text-gray-500">No cars found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
