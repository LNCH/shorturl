<x-table>
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Short URL</th>
        <th scope="col">Status</th>
        <th scope="col">Visits</th>
        <th scope="col">
            <span class="sr-only">Edit</span>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($links as $link)
        <tr>
            <td>
                <div class="text-sm font-medium text-gray-900">
                    <a href="{{ route('links.show', $link) }}">
                        {{ $link->name }}
                    </a>
                </div>
                <div class="text-sm text-gray-500">
                    {{ $link->destination_url }}
                </div>
            </td>
            <td>
                <div class="text-sm text-gray-900">
                    <a href="{{ $link->shortUrl }}" target="short_url_{{ $link->unique_key }}">
                        {{ $link->shortUrl }}
                    </a>
                </div>
            </td>
            <td>
                <x-link-status :status="$link->status" />
            </td>
            <td>
                <span class="text-sm text-gray-500">
                    {{ $link->visits }}
                </span>
            </td>
            <td class="text-right text-sm font-medium">
                <a href="#">Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5">
                {{ $links->links() }}
            </td>
        </tr>
    </tfoot>
</x-table>