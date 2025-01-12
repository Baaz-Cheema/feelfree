<div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
    <form wire:submit="save" class="space-y-4">
        <div class="text-left">
                        <textarea
                            wire:model="form.body"
                            name="worry"
                            rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                            placeholder="Share your thoughts anonymously..."
                        ></textarea>
        </div>
        <div class="text-left">
            <select
                wire:model="form.tag"
                name="tags"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
            >
                <option>Select a tag</option>
                @foreach(\App\Models\Tag::all() as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            <span class="text-sm text-gray-400">Tag your worry so people can find similar worries and share support</span>
        </div>
        <div class="text-right">
            <button
                type="submit"
                class=" bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 ml-auto"
            >
                Share Anonymously
            </button>
        </div>
    </form>
</div>
