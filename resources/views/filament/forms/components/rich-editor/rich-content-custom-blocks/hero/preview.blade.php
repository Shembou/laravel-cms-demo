<section class="hero-block-preview"
    style="
    background: #f9fafb;
    border-radius: 0.75rem;
    border: 1px solid #e5e7eb;
    overflow: hidden;
    max-height: 400px;
    overflow-y: auto;
">
    @if ($image)
        <div class="hero-image-preview"
            style="
            width: 100%;
            height: 180px;
            overflow: hidden;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        ">
            <img src="{{ $image }}" alt="{{ $heading }}"
                style="
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                " />
        </div>
    @endif

    <div class="hero-content-preview" style="
        padding: 1.5rem;
    ">
        <h1
            style="
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 0.5rem 0;
            line-height: 1.4;
        ">
            {{ $heading }}</h1>

        @if ($description)
            <p
                style="
                font-size: 0.875rem;
                color: #6b7280;
                margin: 0 0 1rem 0;
                line-height: 1.6;
            ">
                {{ $description }}</p>
        @endif

        @if ($button)
            <div class="hero-button-preview" style="margin-top: 1rem;">
                {!! $button !!}
            </div>
        @endif
    </div>
</section>
