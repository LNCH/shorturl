<div>
    @if ($attributes['status'] == \App\Models\Link::STATUS_ACTIVE)
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
            {{ ucwords($attributes['status']) }}
        </span>
    @elseif($attributes['status'] == \App\Models\Link::STATUS_INACTIVE)
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-500">
            {{ ucwords($attributes['status']) }}
        </span>
    @elseif($attributes['status'] == \App\Models\Link::STATUS_BROKEN)
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
            {{ ucwords($attributes['status']) }}
        </span>
    @endif
</div>