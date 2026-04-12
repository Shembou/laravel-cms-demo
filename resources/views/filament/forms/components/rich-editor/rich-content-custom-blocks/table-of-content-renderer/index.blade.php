@use('App\Filament\Helpers\RichContentHelper')

<section class="table-of-content-section" style="background: white; padding: 2rem 0;">
    @if(isset($content) && isset($content['content']))
        <div style="display: grid; grid-template-columns: 260px 1fr; gap: 2rem; max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
            <nav class="table-of-contents-nav" style="
                background: #f9fafb;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                padding: 1.25rem;
                height: fit-content;
                position: sticky;
                top: 2rem;
            ">
                <h3 style="
                    font-size: 0.875rem;
                    font-weight: 600;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                    color: #9333ea;
                    margin: 0 0 1rem 0;
                ">
                    Spis treści
                </h3>

                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach(RichContentHelper::extractHeadings($content['content']) as $heading)
                        <li style="margin-bottom: 0.5rem;">
                            <a
                                href="#{{ $heading['id'] }}"
                                class="toc-link"
                                style="
                                    display: block;
                                    padding: 0.25rem 0.5rem;
                                    border-radius: 0.375rem;
                                    color: #374151;
                                    text-decoration: none;
                                    font-size: 0.875rem;
                                    transition: all 0.2s;
                                    text-overflow: ellipsis;
                                    overflow: hidden;
                                    white-space: nowrap;
                                "
                            >
                                {{ $heading['text'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="table-of-contents-content" style="padding: 1rem 0;">
                {!! RichContentHelper::renderRichContent($content['content']) !!}
            </div>
        </div>
    @endif
</section>

<style>
    .toc-link:hover {
        background: #f5f3ff;
        color: #7c3aed;
    }

    @media (max-width: 1024px) {
        .table-of-content-section > div {
            grid-template-columns: 1fr;
        }

        .table-of-contents-nav {
            position: static;
            margin-bottom: 1.5rem;
        }
    }
</style>