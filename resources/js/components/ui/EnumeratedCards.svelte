<script lang="ts">
    import { theme } from '@/stores/theme';
    let { count, faClassName, heading, children, className = '' } = $props();
</script>

<div class="relative group enumerated-card {className}">
    <div
        class="counter absolute -top-4 w-16 h-16 bg-gradient-to-br from-purple-600 to-violet-600 rounded-3xl flex items-center justify-center text-3xl font-bold text-white shadow-2xl transform duration-300 md:-left-4 -left-2"
    >
        {count}
    </div>
    <div
        class="glass p-6 rounded-3xl pt-12 transform duration-500 hover:shadow-2xl hover:shadow-purple-500/20"
    >
        <div class="mb-4">
            <div
                class="w-16 h-16 bg-gradient-to-br from-purple-600/20 to-violet-600/20 rounded-2xl flex items-center justify-center mb-3 transition-transform duration-300"
            >
                <i
                    class={`fas ${faClassName} text-3xl gradient-text ${$theme === 'dark' ? ' text-white' : 'text-black'}`}
                ></i>
            </div>
        </div>
        <h3
            class="text-xl font-bold mb-3 {$theme === 'dark'
                ? 'text-white'
                : 'text-gray-900'}"
        >
            {heading}
        </h3>
        <p
            class="{$theme === 'dark'
                ? 'text-[#C4C4E0]'
                : 'text-gray-600'} leading-relaxed text-sm"
        >
            {@render children()}
        </p>
    </div>
</div>

<style lang="scss">
    .counter {
        transition: transform 0.3s ease;
    }
    .enumerated-card:hover .counter {
        transform: rotate(40deg);
    }
    .enumerated-card:hover .glass {
        box-shadow: 0 25px 50px -12px rgba(139, 92, 246, 0.2);
    }
</style>
