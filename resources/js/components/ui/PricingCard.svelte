<script lang="ts">
    import { theme } from '@/stores/theme';
    let {
        faClassName,
        heading,
        price,
        subtitle,
        isPopular = false,
        children,
        className = '',
    } = $props();
</script>

<div
    class="glass md:p-8 p-3 rounded-3xl {isPopular
        ? 'border-2 border-[#8B5CF6] relative'
        : ''} transform hover:scale-105 transition-all duration-500 hover:shadow-2xl hover:shadow-purple-500/{isPopular
        ? '40'
        : '20'} group {className}"
>
    {#if isPopular}
        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
            <span
                class="bg-gradient-to-r from-[#7C3AED] to-[#8B5CF6] text-white px-4 py-1 rounded-full text-xs font-bold shadow-lg"
                >Popularny</span
            >
        </div>
    {/if}
    <div class="text-center mb-6 {isPopular ? 'mt-3' : ''}">
        <div
            class="w-14 h-14 {isPopular
                ? 'bg-gradient-to-br from-purple-600 to-violet-600 shadow-lg'
                : 'bg-gradient-to-br from-purple-600/20 to-violet-600/20'} rounded-2xl flex items-center justify-center mx-auto mb-3 transition-transform duration-300"
        >
            <i
                class={`fas ${faClassName} text-2xl ${isPopular ? 'text-white' : 'gradient-text'} ${$theme === 'dark' && !isPopular ? 'text-white' : 'text-black'}`}
            ></i>
        </div>
        <h3
            class="text-xl font-bold mb-3 {$theme === 'dark'
                ? 'text-white'
                : 'text-gray-900'}"
        >
            {heading}
        </h3>
        <p
            class={`text-4xl font-bold mb-2 gradient-text ${$theme === 'dark' ? 'text-white' : 'text-black'}`}
        >
            {price}
        </p>
        <p
            class="{$theme === 'dark'
                ? 'text-[#C4C4E0]'
                : 'text-gray-600'} text-sm"
        >
            {subtitle}
        </p>
    </div>
    <ul
        class="{$theme === 'dark'
            ? 'text-[#C4C4E0]'
            : 'text-gray-600'} space-y-3 text-sm"
    >
        {@render children()}
    </ul>
</div>

<style lang="scss">
    .glass {
        transition: all 0.5s ease;
    }

    .glass.popular {
        box-shadow: 0 25px 50px -12px rgba(139, 92, 246, 0.4);
    }

    .glass:not(.popular):hover {
        box-shadow: 0 25px 50px -12px rgba(139, 92, 246, 0.2);
    }
</style>
