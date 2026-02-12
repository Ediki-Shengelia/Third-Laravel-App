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
                    {{ __("You're logged in!") }}
                    <img class="h-20 w-20" src="{{ Storage::url(auth()->user()->photo) }}" alt="">
                    <p>{{ auth()->user()->name }}
                        <span class="text-red-500">{{ auth()->user()->email }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
