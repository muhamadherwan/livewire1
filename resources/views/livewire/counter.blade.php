@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div>
    <span>{{$count}}</span>
    <button wire:click="decrement">-</button>
    <button wire:click="increment">+</button>
</div>
