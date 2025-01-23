<div>
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

        </div>
    </div>

    <!-- Recent Posts Section -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800">
                @if($this->by == 'recent')
                    Recent
                @elseif($this->by == 'popular')
                    Popular
                @else
                    Recent
                @endif
                Posts
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Posts -->
            @forelse($posts as $post)
                <x-posts.post-card :post="$post" :key="$post->uuid"/>
            @empty
                <p class="text-gray-600">No posts found.</p>
            @endforelse
        </div>
    </div>

    @if($this->hasMore)
        <div class="self-center loading loading-spinner" x-intersect="$wire.loadMore()"></div>
    @endif

</div>
