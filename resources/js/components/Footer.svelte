<script lang="ts">
    import { theme } from '@/stores/theme';
</script>

<footer
    class="py-8 border-t transition-colors duration-300 {$theme === 'dark'
        ? 'bg-[#0D0D14] border-[#2A2350]'
        : 'bg-gray-50 border-gray-200'}"
>
    <div class="container mx-auto px-4 text-center">
        <a href="/" class="inline-block mb-4">
            <h2
                class="text-2xl font-bold {$theme === 'dark'
                    ? 'text-white'
                    : 'text-gray-900'}"
            >
                Box<span class="text-[#A78BFA]">Flow</span>
            </h2>
        </a>
        <p class={$theme === 'dark' ? 'text-[#C4C4E0]' : 'text-gray-600'}>
            © {new Date().getFullYear()} BoxFlow. Wszystkie prawa zastrzeżone.
        </p>
        <p
            class="{$theme === 'dark'
                ? 'text-[#8B8BA0]'
                : 'text-gray-400'} text-sm mt-2"
        >
            Stworzone przez: Boxplease
        </p>
        <div class="flex justify-center gap-4 mt-4">
            <a
                href="/polityka-prywatnosci"
                class="{$theme === 'dark'
                    ? 'text-[#A78BFA] hover:text-[#C4B5FD]'
                    : 'text-purple-600 hover:text-purple-700'} text-sm transition-colors duration-200"
                >Polityka prywatności</a
            >
            <span class={$theme === 'dark' ? 'text-[#8B8BA0]' : 'text-gray-400'}
                >|</span
            >
            <a
                href="/regulamin"
                class="{$theme === 'dark'
                    ? 'text-[#A78BFA] hover:text-[#C4B5FD]'
                    : 'text-purple-600 hover:text-purple-700'} text-sm transition-colors duration-200"
                >Regulamin</a
            >
        </div>
    </div>
</footer>
