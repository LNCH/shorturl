<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="p-6 py-4 bg-gray-50">
            {{ $footer }}
        </div>
    @endisset
</div>