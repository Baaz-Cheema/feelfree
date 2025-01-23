<x-layouts.app>
    <x-header/>
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-50 to-green-100">
        <div class="max-w-7xl mx-auto px-4 pb-12 text-center">
            <h1 class="text-4xl font-bold text-green-800 mb-4">
                Share Your Thoughts, Find Your Support
            </h1>

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
                <x-posts.post-card :post="$post" :key="$post->uuid"/>
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
                <x-posts.post-card :post="$post" />
            @empty
                <p class="text-gray-600">No recent posts found.</p>
            @endforelse
        </div>
    </div>

</x-layouts.app>
