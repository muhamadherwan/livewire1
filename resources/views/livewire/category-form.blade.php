<div>
    <form wire:submit.prevent="save">

        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="mb-4">
            <button type="button" wire:click.prevent="addRow">Add Row</button>
        </div>

        <div class="mb-4">
            <button type="submit">Save</button>
        </div>

{{--        <div class="mb-4">--}}
{{--            <label for="name_0">Name</label>--}}
{{--            <input type="text" id="name_0" wire:model.defer="rows.0.name">--}}
{{--            @error('rows.0.name') <span class="error">{{ $message }}</span> @enderror--}}
{{--        </div>--}}

                <div class="mb-4">
                    <label for="cat1">Name</label>
                    <input type="text" id="cat1" wire:model.defer="cat1">
                    @error('cat1') <span class="error">{{ $message }}</span> @enderror
                </div>



{{--    dynamic form--}}
    @foreach ($rows as $index => $row)
        <div class="mb-4">
            <label for="name_{{ $index + 1 }}">Name</label>
            <input type="text" id="name_{{ $index + 1 }}" wire:model.defer="rows.{{ $index + 1 }}.name">
            @error('rows.'.$index.'.name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <button type="button" wire:click.prevent="removeRow({{ $index }})">Remove</button>
        </div>
    @endforeach

    </form>
</div>
