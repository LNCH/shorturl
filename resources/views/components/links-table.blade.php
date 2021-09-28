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
        @forelse ($links as $link)
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
                    <a href="{{ route('links.edit', $link) }}" class="button">Edit</a>
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
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No links found, use the 'New Link' button above to create a short URL</td>
            </tr>
        @endforelse
    </tbody>
    @if (count($links))
        <tfoot>
            <tr>
                <td colspan="5">
                    {{ $links->links() }}
                </td>
            </tr>
        </tfoot>
    @endif
</x-table>