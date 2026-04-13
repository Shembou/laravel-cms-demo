@use('App\Filament\Helpers\RichContentHelper')

<section class="table-of-content-section bg-white dark:bg-gray-900 py-8">
    @if (isset($content) && isset($content['content']))
        <div class="flex flex-wrap sm:flex-nowrap">
            <nav
                class="table-of-contents-nav
                bg-gray-50 dark:bg-gray-800
                border border-gray-200 dark:border-gray-700
                rounded-lg
                p-5
                h-fit
                sticky top-8
                lg:static
                lg:mb-6
            ">
                <h3 class="text-sm font-semibold uppercase tracking-wider text-purple-600 dark:text-purple-400 mb-4">
                    Spis treści
                </h3>

                <ul class="list-none p-0 m-0">
                    @foreach (RichContentHelper::extractHeadings($content['content']) as $heading)
                        <li class="mb-2">
                            <a href="#{{ $heading['id'] }}"
                                class="toc-link
                                    block
                                    px-2 py-1
                                    rounded-md
                                    text-gray-700 dark:text-gray-300
                                    text-sm
                                    transition-all duration-200
                                    truncate
                                    hover:bg-purple-50 dark:hover:bg-purple-900/20
                                    hover:text-purple-600 dark:hover:text-purple-400
                                ">
                                {{ $heading['text'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="table-of-contents-content py-4">
                {!! RichContentHelper::renderRichContent($content['content']) !!}
            </div>
        </div>
    @endif
</section>
