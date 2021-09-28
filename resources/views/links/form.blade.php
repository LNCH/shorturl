<form action="{{ isset($link) ? route('links.update', $link) : route('links.store') }}" method="post">

    @csrf()
    @method(isset($link) ? 'PATCH' : 'POST')

    <x-panel>

        <div class="max-w-sm" x-data="{ codeType: '{{ $link->type ?? 'code' }}' }">

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Link Name</label>
                <div class="mt-1">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                        value="{{ old('name', $link->name ?? '') }}"
                        required
                    >
                </div>
            </div>

            <div class="mb-6">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>

                <select id="type" name="type" aria-describedby="type-description" @change="codeType = $event.target.value" required
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="code" @if(old('type', $link->type ?? '') == 'code') selected @endif>Shortcode</option>
                    <option value="friendly" @if(old('type', $link->type ?? '') == 'friendly') selected @endif>Friendly URL</option>
                </select>

                <p class="mt-2 text-sm text-gray-500" id="type-description">Shortcodes use a 5 long unique code to identify the link. Friendly URLs will allow you to choose your own link text.</p>
            </div>

            <div class="mb-6" x-show="codeType == 'friendly'">
                <label for="unique_key" class="block text-sm font-medium text-gray-700">URL Text</label>
                <div class="mt-1">
                    <div class="mt-1 flex focus-within:ring-indigo-500 ">
                        <p class="bg-gray-100 text-gray-500 px-2 flex items-center rounded-tl-md rounded-bl-md border-gray-300 border border-r-0">
                            {{ env('SHORTURL') }}/
                        </p>
                        <input
                            type="text"
                            name="unique_key"
                            id="unique_key"
                            class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-tr-md rounded-br-md"
                            aria-describedby="unique_key-description"
                            value="{{ old('unique_key', $link->unique_key ?? '') }}"
                        >
                    </div>
                </div>
                <p class="mt-2 text-sm text-gray-500" id="unique_key-description">The text you'd like to use as your URL.</p>
            </div>

        </div> <!-- End .max-w-sm -->

        <div class="max-w-lg">

            <div class="mb-6">
                <label for="destination_url" class="block text-sm font-medium text-gray-700">Destination URL</label>
                <div class="mt-1">
                    <input
                        type="text"
                        name="destination_url"
                        id="destination_url"
                        class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md"
                        aria-describedby="destination_url-description"
                        value="{{ old('destination_url', $link->destination_url ?? '') }}"
                    >
                </div>
                <p class="mt-2 text-sm text-gray-500" id="destination_url-description">The URL you would like
                    the short URL to redirect to.</p>
            </div>

        </div> <!-- End .max-w-lg -->

        <div class="max-w-xs">

            <div class="mb-6">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>

                <select id="status" name="status" aria-describedby="status-description"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="active" @if(old('status', $link->status ?? '') == 'active') selected @endif>Active</option>
                    <option value="draft" @if(old('status', $link->status ?? '') == 'draft') selected @endif>Draft</option>
                </select>

                <p class="mt-2 text-sm text-gray-500" id="status-description">'Draft' links will not
                    redirect the user to the intended URL until they are made 'Active'</p>
            </div>

        </div> <!-- End .max-w-xs -->

        <div class="max-w-sm">

            <div class="mb-6">
                <label for="expires_at" class="block text-sm font-medium text-gray-700">Expiry Date</label>

                <input
                    type="datetime-local"
                    name="expires_at"
                    id="expires_at"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                    aria-describedby="expires_at-description"
                    value="{{ old('expires_at', (isset($link) && $link->expires_at) ? $link->expires_at->format('Y-m-d\TH:i') : null) }}"
                >

                <p class="mt-2 text-sm text-gray-500" id="expires_at-description">Optional. By default all
                    links will work until cancelled. You can set an expiry date here to cause the link to
                    stop redirecting after this date.</p>
            </div>

        </div> <!-- End .max-w-sm -->

        <x-slot name="footer">
            <x-button>{{ isset($link) ? 'Update' : 'Create' }} Link</x-button>
        </x-slot>

    </x-panel>

</form>