<!-- Comments Section -->
<div class="bg-white rounded-lg shadow-md p-6 border border-green-100 mt-8">
    <h3 class="text-xl font-semibold text-gray-800 mb-6">Comments</h3>

    <!-- New Comment Form -->
    <div class="mb-8">
        <form wire:submit.prevent="save">
            <div class="mb-4">
                    <textarea
                        wire:model="body"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        rows="3"
                        placeholder="Add a comment..."
                    ></textarea>
                    @error('comment') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    Comment
                </button>
            </div>
        </form>
    </div>

    <!-- Comments List -->
    <div class="space-y-6">
        @forelse($comments as $comment)
            <div class="border-b border-gray-100 pb-6 last:border-b-0 last:pb-0" wire:key="comment-{{ $comment->id }}">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    <div class="flex items-center space-x-2">
                        <livewire:reaction :reactionableId="$comment->id" reactionableType="comment" reaction="support" :key="$comment->id"/>
                    </div>
                </div>
                <p class="text-gray-600">
                    {{ $comment->body }}
                </p>
            </div>
        @empty
            <p class="text-gray-500 text-center py-4">No comments yet. Be the first to comment!</p>
        @endforelse
    </div>
</div>
