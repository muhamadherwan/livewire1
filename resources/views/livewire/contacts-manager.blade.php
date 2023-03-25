<div>
<header class="flex items-center justify-between mb-4 border-b pb-4">
    <h2>Contact</h2>
    <button wire:click="add()" type="button" class="text-white bg-indigo-600 rounded-lg px-5 py-2.5">
        Add Contact
    </button>
</header>
    @if (session()->has('success'))
        <div class="bg-green-400 text-green-50 py-5 px-2 rounded-md my-4">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $index => $contact)
            <tr>
                <td class="px-6 py-4">
                    <input wire:model="contacts.{{ $index }}.name" type="text" placeholder="name" class="border">
                    @error('contacts.'.$index.'.name')<span class="text-pink-500">{{$message}}</span>@enderror
                </td>
                <td class="px-6 py-4">
                    <input wire:model="contacts.{{ $index }}.email" type="text" placeholder="email" class="border">
                    @error('contacts.'.$index.'.email')<span class="text-pink-500">{{$message}}</span>@enderror
                </td>
                <td class="px-6 py-4">
                    <button wire:click="delete({{ $index }})" type="button" class="text-white bg-indigo-600 rounded-lg px-5 py-2.5    ">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <button wire:click="save()" type="button" class="text-white bg-indigo-600 rounded-lg px-5 py-2.5    ">
        Save
    </button>
</div>
