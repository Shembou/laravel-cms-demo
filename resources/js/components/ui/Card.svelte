<script lang="ts">
    import { theme } from '@/stores/theme';
    let { faClassName, heading, children, className = '' } = $props();
</script>

<div
    class="glass p-6 rounded-3xl transition-all duration-500 hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/20 group {className ??
        ''}"
>
    <div class="relative overflow-hidden mb-4">
        <div
            class="relative w-12 h-12 bg-gradient-to-br from-purple-600 to-violet-600 rounded-2xl flex items-center justify-center transition-transform duration-300"
        >
            <i class={`fas ${faClassName} text-xl text-white`}></i>
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

<style lang="scss">
    .glass {
        transition: all 0.5s ease;
    }

    .glass:hover {
        transform: scale(1.05);
        box-shadow: 0 25px 50px -12px rgba(139, 92, 246, 0.2);
    }
</style>
