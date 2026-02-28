<div class="p-6 bg-white rounded-xl shadow space-y-4">
    <h2 class="text-xl font-semibold">Counter: {{ $count }}</h2>

    <div class="flex gap-2">
        <button wire:click="increment" class="px-4 py-2 rounded-lg bg-black text-white hover:opacity-90">
            +
        </button>

        <button wire:click="$set('count', 0)" class="px-4 py-2 rounded-lg border">
            Reset
        </button>
    </div>
</div>
