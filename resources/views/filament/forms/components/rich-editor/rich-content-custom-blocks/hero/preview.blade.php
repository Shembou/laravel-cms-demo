<section
    class="hero-block-preview
    bg-gray-50 dark:bg-gray-900
    border-b border-gray-200 dark:border-gray-800
    overflow-hidden
    max-h-[400px]
    overflow-y-auto
">
    @if ($image)
        <div
            class="hero-image-preview
            w-full
            h-[180px]
            overflow-hidden
            bg-gradient-to-br from-indigo-500 to-purple-600
            flex
            items-center
            justify-center
        ">
            <img src="{{ $image }}" alt="{{ $heading }}" class="w-full h-full object-cover" />
        </div>
    @endif

    <div class="hero-content-preview p-6">
        <h1 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2 leading-tight">
            {{ $heading }}</h1>

        @if ($description)
            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 leading-relaxed">
                {{ $description }}</p>
        @endif

        @if ($button)
            <div class="hero-button-preview mt-4">
                {!! $button !!}
            </div>
        @endif
    </div>
</section>
