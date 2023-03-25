<div>
    <form wire:submit.prevent="submit">
        <div class="mb-4">
            <label for="name">Name</label>
            <input type="text" id="name" wire:model.defer="name">
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="email">Email</label>
            <input type="email" id="email" wire:model.defer="email">
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <button type="button" wire:click.prevent="addRow">Add Row</button>
        </div>

        @foreach ($rows as $index => $row)
            <div class="mb-4">
                <label for="name_{{ $index }}">Name</label>
                <input type="text" id="name_{{ $index }}" wire:model.defer="rows.{{ $index }}.name">
                @error('rows.'.$index.'.name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="email_{{ $index }}">Email</label>
                <input type="email" id="email_{{ $index }}" wire:model.defer="rows.{{ $index }}.email">
                @error('rows.'.$index.'.email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <button type="button" wire:click.prevent="removeRow({{ $index }})">Remove</button>
            </div>
        @endforeach

        <div class="mb-4">
            <button type="submit">Save</button>
        </div>
    </form>
</div>
