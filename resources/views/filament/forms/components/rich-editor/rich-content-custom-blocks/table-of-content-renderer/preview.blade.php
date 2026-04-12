@use('App\Filament\Helpers\RichContentHelper')

<div style="background: #f9fafb; border-radius: 0.5rem; border: 1px solid #e5e7eb; overflow: hidden;">
    @if(isset($content) && isset($content['content']))
        <div style="display: grid; grid-template-columns: 260px 1fr; gap: 2rem; max-width: 1200px;">
            <nav style="
                background: white;
                border: 1px solid #e5e7eb;
                border-radius: 0.5rem;
                padding: 1.25rem;
                height: fit-content;
                position: sticky;
                top: 1rem;
                max-height: 500px;
                overflow-y: auto;
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
                                onmouseover="this.style.background='#f5f3ff'; this.style.color='#7c3aed';"
                                onmouseout="this.style.background='transparent'; this.style.color='#374151';"
                            >
                                {{ $heading['text'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div style="padding: 1.5rem; max-height: 500px; overflow-y: auto;">
                {!! RichContentHelper::renderRichContent($content['content']) !!}
            </div>
        </div>
    @else
        <div style="padding: 3rem; text-align: center; color: #9ca3af; font-style: italic;">
            No content to display
        </div>
    @endif
</div>