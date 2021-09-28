<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-1">
                    {{ $link->name }}
                </h2>
                <x-link-status :status="$link->liveStatus" />
            </div>
            <div>
                <a class="button" href="{{ route('links.edit', $link) }}">Edit Link</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-panel>
                <img style="max-width: 128px;" src="data:image/png;base64, {{ base64_encode($link->qrCodeImage) }}" alt="">
            </x-panel>

        </div>
    </div>
</x-app-layout>
