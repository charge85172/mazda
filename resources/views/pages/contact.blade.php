<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-mazda-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-4">Get in Touch</h3>
                    <p class="mb-4">
                        Have questions, suggestions, or just want to talk about Mazda? Feel free to reach out!
                    </p>
                    <p>
                        You can contact us via email at <a href="mailto:info@mazdafanpage.com"
                                                           class="text-mazda-red hover:underline">info@mazdafanpage.com</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
