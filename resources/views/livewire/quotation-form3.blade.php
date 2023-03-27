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
                <div>
                    <h3 class="font-bold text-lg">Items</h3>
                    <div class="mt-2">
                        @foreach($category['items'] as $itemIndex => $item)
                            <div class="flex items-center mt-5">
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       type="text" placeholder="Item Name" wire:model.defer="categories.{{ $index }}.items.{{ $itemIndex }}.name" wire:dirty.class="border-red-500"
                                >
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline ml-2 mt-2"
                                        type="button" wire:click.prevent="removeItemField({{ $index }}, {{ $itemIndex }})">
                                    Remove
                                </button>
                            </div>
                            @error('categories.'.$index.'.items.'.$itemIndex.'.name')
                            <span class="error">{{ $message }}</span>
                            @enderror
                            <div class="mt-1">
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                          placeholder="Item Description" wire:model.defer="categories.{{ $index }}.items.{{ $itemIndex }}.description"
                                ></textarea>
                            </div>
                            @error('categories.'.$index.'.items.'.$itemIndex.'.description')
                            <span class="error">{{ $message }}</span>
                            @enderror

                        @endforeach
                    </div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline mt-2"
                            type="button" wire:click.prevent="addItemField({{ $index }})">
                        Add Item
                    </button>
                </div>
            </div>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mt-5 rounded focus:outline-none focus:shadow-outline mt-5 mb-5"
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
</div>
