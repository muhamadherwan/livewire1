<div>
    <div>
        {{ $successMessage }}
    </div>

    <form wire:submit.prevent="submit" class="p-4 bg-white rounded-lg shadow-md">
        <div class="mb-4">
            <label for="name" class="block font-medium text-gray-700">Name</label>
            <input type="text" class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                   id="name" placeholder="Enter name" wire:model="name">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50">
            Save
        </button>
    </form>

</div>
