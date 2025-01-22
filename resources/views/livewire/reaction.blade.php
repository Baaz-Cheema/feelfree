<button wire:click.prevent="save" type="button" class="text-green-600 hover:text-green-800 transition-colors"
        x-data x-tooltip.raw="Send support by giving {{ $emoji }}">
    {{ $emoji }} <span class="text-sm">{{ $this->reactionCount }}</span>
    @error('reaction') <span class="error text-red-500">{{ $message }}</span> @enderror
</button>
