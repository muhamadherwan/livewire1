<div>
{{--    default form--}}
    <div>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               type="text" placeholder="name" wire:model.defer="nameD" wire:dirty.class="border-red-500"
        >
        @error('nameD') <span class="error mb-5">{{ $message }}</span> @enderror
    </div>

    {{--    dynamic form--}}
{{--        <form wire:submit.prevent="submit">--}}
    @foreach ($names as $index => $name)
        <div>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 mt-5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   type="text" placeholder="name" wire:model.defer="names.{{ $index }}" wire:dirty.class="border-red-500"
            >
            @error('names.'.$index) <span class="error mb-5">{{ $message }}</span> @enderror

            <div>
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
            Add Name Field
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
