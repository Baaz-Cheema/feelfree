<x-layouts.app>
    <x-header/>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-50 to-green-100">
        <div class="max-w-7xl mx-auto px-4 py-20 text-center">
            <h1 class="text-4xl font-bold text-green-800 mb-4">
                Share Your Thoughts, Find Your Support
            </h1>
            <p class="text-xl text-green-600 max-w-2xl mx-auto mb-8">
                "In sharing our worries, we find strength. In supporting others, we find purpose."
            </p>

            <livewire:posts.create-post/>

        </div>
    </div>

    <!-- Recent Posts Section -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Recent Posts</h2>
            <a href="{{ route('posts.index', '?by=recent') }}"
               class="text-green-600 hover:text-green-700 font-medium flex items-center">
                View All
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Recent Posts -->
            @forelse($recentPosts as $post)
                <a href="{{ route('posts.show', $post->uuid) }}">
                    <div class="bg-white rounded-lg shadow-md p-6 border border-green-100 h-48">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-600 mb-2">
                            {{ str($post->body)->limit(100, '...') }}
                            @if(strlen($post->body) > 100)
                                <span><a href="{{ route('posts.show', $post->uuid) }}" class="text-green-600 hover:underline">Read more</a></span>
                            @endif
                        </p>
                        <div class="flex flex-wrap mb-4">
                            @foreach($post->tags as $tag)
                                <div
                                    class="{{ $loop->first ? '' : 'px-3' }} text-sm bg-green-50 text-green-600 rounded-full">
                                    #{{ $tag->name }}
                                </div>
                            @endforeach
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-green-100">
                            <div class="flex items-center space-x-4 text-gray-500">

                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center text-gray-500">
                                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-sm">{{ $post->views }}</span>
                                </div>
                                <livewire:reaction :reactionableId="$post->uuid" reactionableType="post" reaction="support"/>
                                <button class="flex items-center text-green-600 hover:text-green-700 transition-colors">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z"/>
                                    </svg>
                                    <span class="text-sm">7 Comment</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-gray-600">No recent posts found.</p>
            @endforelse
        </div>
    </div>

    <!-- Popular Posts Section -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Popular Posts</h2>
            <a href="{{ route('posts.index', '?by=popular') }}"
               class="text-green-600 hover:text-green-700 font-medium flex items-center">
                View All
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Popular Posts -->
            @forelse($popularPosts as $post)
                <a href="{{ route('posts.show', $post->uuid) }}">
                    <div class="bg-white rounded-lg shadow-md p-6 border border-green-100">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-600 mb-2">
                            {{ $post->body }}
                        </p>
                        <div class="flex flex-wrap mb-4">
                            @foreach($post->tags as $tag)
                                <div
                                    class="{{ $loop->first ? '' : 'px-3' }} text-sm bg-green-50 text-green-600 rounded-full">
                                    #{{ $tag->name }}
                                </div>
                            @endforeach
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-green-100">
                            <div class="flex items-center space-x-4 text-gray-500">

                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center text-gray-500">
                                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span class="text-sm">{{ $post->views }}</span>
                                </div>
                                <livewire:reaction :reactionableId="$post->uuid" reactionableType="post" reaction="support"/>
                                <button class="flex items-center text-green-600 hover:text-green-700 transition-colors">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z"/>
                                    </svg>
                                    <span class="text-sm">7 Comment</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-gray-600">No recent posts found.</p>
            @endforelse
        </div>
    </div>

</x-layouts.app>
