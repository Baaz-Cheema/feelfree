<div>
    <x-header/>

    <div class="max-w-3xl mx-auto px-4 py-12">
        <!-- Single Post -->
        <x-posts.post-card :post="$post" />

        <livewire:comments.index :post="$post"/>
    </div>
</div>
