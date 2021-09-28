<div>
    <div class="modal-header">
        Email Link
    </div>

    <div class="modal-body">
        <p class="mb-6">
            Enter the email address you'd like to send this URL to.
        </p>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <div class="mt-1">
                <input
                    type="text"
                    wire:model="email"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                    required
                >
                @error('email')
                    <p class="error text-sm mt-2 text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <button class="button" wire:click="send">Send Email</button>
    </div>
</div>
