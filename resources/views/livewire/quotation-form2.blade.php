<div>
    @foreach($categories as $index => $category)
        <div class="bg-indigo-100 mt-5">
            <div class="px-5">
                <input class="shadow appearance-none border rounded w-full py-2 px-3 mt-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="text" placeholder="Category Name" wire:model.defer="categories.{{ $index }}.category" wire:dirty.class="border-red-500"
                >
                @error("categories.{$index}.category") <span class="error mb-5">{{ $message }}</span> @enderror
            </div>
            <div class="px-5">
                <input class="shadow appearance-none border rounded w-full py-2 px-3 mt-5 mb-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       type="text" placeholder="Item Name" wire:model.defer="categories.{{ $index }}.item" wire:dirty.class="border-red-500"
                >
                @error("categories.{$index}.item") <span class="error mb-5">{{ $message }}</span> @enderror
            </div>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5 mb-5"
                    type="button" wire:click.prevent="removeNameField({{ $index }})">
                Remove Category
            </button>
        </div>
    @endforeach

    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5 mb-5"
            type="button" wire:click.prevent="addNameField">
        Add New Category
    </button>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5 mb-5"
                wire:click.prevent="submit">
            Save
        </button>
        <div>
            {{ $successMessage }}
        </div>
