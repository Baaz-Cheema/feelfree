<div class="h-screen flex justify-center items-center">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6 border border-green-100">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm text-gray-500">sss</span>
            </div>
            <p class="text-gray-600 mb-2">
                body
            </p>
            <div class="flex flex-wrap mb-4">
{{--                @foreach($post->tags as $tag)--}}
{{--                    <div--}}
{{--                        class="{{ $loop->first ? '' : 'px-3' }} text-sm bg-green-50 text-green-600 rounded-full">--}}
{{--                        #{{ $tag->name }}--}}
{{--                    </div>--}}
{{--                @endforeach--}}
            </div>
            <div class="flex items-center justify-between pt-4 border-t border-green-100">
                <div class="flex items-center space-x-4 text-gray-500">
                </div>
                <div class="flex items-center space-x-4">
{{--                    <livewire:reaction :postId="$post->uuid" reaction="support" :key="$post->id . $post->uuid"/>--}}
                </div>
            </div>
        </div>
    </div>
</div>
