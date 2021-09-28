<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Links') }}
            </h2>
            <div>
                <a class="button" href="{{ route('links.create') }}">New Link</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-links-table />
        </div>
    </div>
</x-app-layout>
