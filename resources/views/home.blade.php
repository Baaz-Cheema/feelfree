<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
            </style>
        @endif
    </head>
    <body class="min-h-screen bg-white">
    <!-- Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="text-2xl font-bold text-green-600">
                FeelFree
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-50 to-green-100">
        <div class="max-w-7xl mx-auto px-4 py-20 text-center">
            <h1 class="text-4xl font-bold text-green-800 mb-4">
                Share Your Thoughts, Find Your Support
            </h1>
            <p class="text-xl text-green-600 max-w-2xl mx-auto">
                "In sharing our worries, we find strength. In supporting others, we find purpose."
            </p>
        </div>
    </div>

    <!-- Recent Posts Section -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Recent Posts</h2>
            <button class="text-green-600 hover:text-green-700 font-medium flex items-center">
                View All
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Recent Posts -->
            @forelse($recentPosts as $recentPost)
            <div class="bg-white rounded-lg shadow-md p-6 border border-green-100">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $recentPost->title }}</h2>
                    <span class="text-sm text-gray-500">{{ $recentPost->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-gray-600 mb-2">
                    {{ $recentPost->body }}
                </p>
                <div class="flex flex-wrap mb-4">
                    @foreach($recentPost->tags as $tag)
                        <div class="{{ $loop->first ? '' : 'px-3' }} text-sm bg-green-50 text-green-600 rounded-full">
                            #{{ $tag->name }}
                        </div>
                    @endforeach
                </div>
                <div class="flex items-center justify-between pt-4 border-t border-green-100">
                    <div class="flex items-center space-x-4 text-gray-500">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                            <span class="text-sm">{{ $recentPost->impressions }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm">{{ $recentPost->views }}</span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <button class="mr-4 text-green-600 hover:text-green-700 transition-colors">
                            🤗
                            <span class="text-sm">5</span>
                        </button>
                        <button class="flex items-center text-green-600 hover:text-green-700 transition-colors">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                            </svg>
                            <span class="text-sm">7 Comment</span>
                        </button>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-gray-600">No recent posts found.</p>
            @endforelse
        </div>
    </div>

    <!-- Popular Posts Section -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Popular Posts</h2>
            <button class="text-green-600 hover:text-green-700 font-medium flex items-center">
                View All
                <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Recent Posts -->
            @forelse($popularPosts as $popularPost)
            <div class="bg-white rounded-lg shadow-md p-6 border border-green-100">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $popularPost->title }}</h2>
                    <span class="text-sm text-gray-500">{{ $popularPost->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-gray-600 mb-4">
                    {{ $popularPost->body }}
                </p>
                <div class="flex items-center justify-between pt-4 border-t border-green-100">
                    <div class="flex items-center space-x-4 text-gray-500">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                            <span class="text-sm">{{ $popularPost->impressions }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm">{{ $popularPost->views }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                            </svg>
                            <span class="text-sm">{{ $popularPost->comments_count }}</span>
                        </div>
                    </div>
                    <button class="flex items-center text-green-600 hover:text-green-700 transition-colors">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                        </svg>
                        <span class="text-sm">Comment</span>
                    </button>
                </div>
            </div>
            @empty
                <p class="text-gray-600">No recent posts found.</p>
            @endforelse
        </div>
    </div>
    </body>
</html>
