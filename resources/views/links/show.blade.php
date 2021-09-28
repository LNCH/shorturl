<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-1">
                    {{ $link->name }}
                </h2>
            </div>
            <div>
                <a class="button" href="{{ route('links.edit', $link) }}">Edit Link</a>
                <form
                    action="{{ route('links.destroy', $link) }}"
                    method="post"
                    style="display: inline;"
                    onsubmit="return confirm('Are you sure you want to delete this link?');"
                >
                    @csrf()
                    @method('DELETE')
                    <button class="button button-danger">Delete</button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex">
                <div class="w-2/3 mr-4">
                    <x-panel>
                        <h2 class="text-lg font-bold mb-4">Link Details</h2>

                        <div class="mb-4">
                            <div class="font-bold opacity-80">Name</div>
                            {{ $link->name }}
                        </div>
                        <div class="mb-4">
                            <div class="font-bold opacity-80">Description</div>
                            {{ $link->description ?? 'Not set' }}
                        </div>
                        <div class="mb-4">
                            <div class="font-bold opacity-80">Destination URL</div>
                            <a href="{{ $link->destination_url }}" target="_linkDestination-{{ $link->id }}">
                                {{ $link->destination_url }}
                            </a>
                        </div>
                        <div class="mb-4">
                            <div class="font-bold opacity-80">Shortened URL</div>
                            <a href="{{ $link->shortUrl }}" target="short_url_{{ $link->unique_key }}">
                                {{ $link->shortUrl }}
                            </a>
                        </div>
                        <div class="mb-4">
                            <div class="font-bold opacity-80">Expiry Date</div>
                            {{ $link->expires_at ? $link->expires_at->format('jS F Y, H:i') : 'Does not expire' }}
                        </div>
                        <div class="mb-4">
                            <div class="font-bold opacity-80">Total Views</div>
                            {{ $link->visits }}
                        </div>

                        <button class="button ml-0" onclick="Livewire.emit('openModal', 'email-link-modal', {{ json_encode(["link" => $link->id]) }})">
                            Email Link
                        </button>
                    </x-panel>
                </div>
                <div class="w-1/3">
                    <x-panel>
                        <div class="p-8 pb-6">
                            <a href="{{ route('links.qr', $link) }}" target="_qr-{{ $link->id }}">
                                <img style="max-width: 100%" src="data:image/png;base64, {{ base64_encode($link->qrCodeImage) }}" alt="">
                            </a>
                            <p class="text-center mt-6 font-bold opacity-90">
                                Click the QR code to open in a new tab
                            </p>
                        </div>
                    </x-panel>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
