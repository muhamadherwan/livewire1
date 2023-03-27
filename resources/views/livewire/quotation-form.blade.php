<div>
    {{--    employee name field--}}
    <div>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               type="text" placeholder="Customer" wire:model.defer="contactName" wire:dirty.class="border-red-500"
        >
        @error('contactName') <span class="error mb-5">{{ $message }}</span> @enderror
    </div>

    {{--    default form--}}
    <div class="bg-indigo-100 mt-5">
        <div class="px-5">
            <input class="shadow appearance-none border rounded w-full py-2 px-3 mt-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   type="text" placeholder="Category Name" wire:model.defer="categoryFirst" wire:dirty.class="border-red-500"
            >
            @error('categoryFirst') <span class="error mb-5">{{ $message }}</span> @enderror
        </div>
    {{--    default form default item form--}}
        <div class="px-5">
            <input class="shadow appearance-none border rounded w-full py-2 px-3 mt-5 mb-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   type="text" placeholder="Item Name" wire:model.defer="itemFirst" wire:dirty.class="border-red-500"
            >
            @error('itemFirst') <span class="error mb-5">{{ $message }}</span> @enderror
        </div>
    </div>

    {{--    dynamic form--}}
    {{--        <form wire:submit.prevent="submit">--}}
    @foreach ($categories as $index => $category)
        <div class="bg-indigo-100 mt-5">
{{--            <div class="divide-y divide-dashed">--}}
{{--            where</div>--}}
            <div class="px-5">

            <input class="shadow appearance-none border rounded w-full py-2 px-3 mt-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   type="text" placeholder="Category name" wire:model.defer="categories.{{ $index }}" wire:dirty.class="border-red-500"
            >
            @error('categories.'.$index) <span class="error mb-5">{{ $message }}</span> @enderror
            </div>
            {{--    default form default item form--}}
{{--            <div>--}}
{{--                <input class="shadow appearance-none border rounded w-full py-2 px-3 mt-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                       type="text" placeholder="Item Name" wire:model.defer="catChildItemFirst" wire:dirty.class="border-red-500"--}}
{{--                >--}}
{{--                @error('catChildItemFirst') <span class="error mb-5">{{ $message }}</span> @enderror--}}
{{--            </div>--}}

        {{-- remove button--}}
            <div class="px-5">
                <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5 mb-5" type="button"
                        wire:click.prevent="removeNameField({{ $index }})">
                    Remove
                </button>
            </div>

        </div>
    @endforeach

    {{--    <button wire:click="addNameField">Add Name Field</button>--}}
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5 mb-5" type="button"
            wire:click.prevent="addNameField">
        Add New Category
    </button>

    {{--        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5 mb-5"--}}
    {{--                type="button" wire:click="save">Save</button>--}}

    {{--        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5 mb-5"--}}
    {{--                type="submit" wire:click.prevent="save">--}}
    {{--            Save--}}
    {{--        </button>--}}

    {{--            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5 mb-5"--}}
    {{--                    type="submit">Save</button>--}}
    {{--    </form>--}}
    {{--    @if (session()->has('message'))--}}
    {{--        <div class="success">{{ session('message') }}</div>--}}
    {{--    @endif--}}
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-5 mb-5"
            wire:click.prevent="submit">
        Save
    </button>
    <div>
        {{ $successMessage }}
    </div>
</div>
