<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Links') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table class="w-full border-collapse border">
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Destination URL</th>
                            <th>Short Link</th>
                            <th>Visits</th>
                        </tr>
                        @foreach ($links as $link)
                            <tr>
                                <td>{{ $link->id }}</td>
                                <td>{{ $link->unique_key }}</td>
                                <td>{{ $link->destination_url }}</td>
                                <td>
                                    <a href="{{ $link->shortUrl }}" target="_blank">
                                        {{ $link->shortUrl }}
                                    </a>
                                </td>
                                <td>{{ $link->visits }}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
