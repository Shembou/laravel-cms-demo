<a
    href="{{ $link }}"
    class="hero-button {{ $is_primary
        ? 'hero-button-primary'
        : 'hero-button-secondary'
    }} inline-flex items-center justify-center px-5 py-2.5 rounded-lg font-medium text-sm text-decoration-none transition-all duration-200 ease-in-out {{ $is_primary
        ? 'bg-gradient-to-br from-indigo-500 to-purple-600 text-white shadow-md hover:shadow-lg hover:-translate-y-0.5'
        : 'bg-gray-100 text-gray-700 border border-gray-300 hover:bg-gray-200 hover:border-gray-400 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:border-gray-600'
    }}"
    style="text-decoration: none;"
>
    {{ $content }}
</a>