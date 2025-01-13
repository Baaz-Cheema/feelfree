<div>
    <x-header/>

    <div class="max-w-3xl mx-auto px-4 py-12">
        <!-- Single Post -->
        <div class="bg-white rounded-lg shadow-md p-6 border border-green-100 mb-8">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-gray-600 mb-2">
                {{ $post->body }}
            </p>
            <div class="flex flex-wrap mb-4">
                @foreach($post->tags as $tag)
                    <div class="{{ $loop->first ? '' : 'px-3' }} text-sm bg-green-50 text-green-600 rounded-full">
                        #{{ $tag->name }}
                    </div>
                @endforeach
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-green-100">
                <div class="flex items-center space-x-4 text-gray-500">
                </div>
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-gray-500">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm">{{ $post->views }}</span>
                    </div>
                    <livewire:reaction :reactionableId="$post->uuid" reactionableType="post" reaction="support"/>
                </div>
            </div>
        </div>

        <livewire:comments.index :post="$post"/>
    </div>
</div>
