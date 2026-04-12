<script lang="ts">
    import { theme } from '@/stores/theme';
    let {
        type = 'text',
        name = '',
        placeholder = '',
        label = '',
        required = false,
        disabled = false,
        className = '',
    }: {
        type?: 'text' | 'email' | 'tel';
        name?: string;
        placeholder?: string;
        label?: string;
        required?: boolean;
        className?: string;
        disabled?: boolean;
    } = $props();
</script>

<div class="space-y-1">
    <label
        class="block font-semibold {$theme === 'dark'
            ? 'text-white'
            : 'text-gray-900'} mb-1"
        for={name}
    >
        {label}
    </label>
    <input
        {type}
        {name}
        {placeholder}
        {required}
        {disabled}
        class="w-full border-2 rounded-xl px-4 py-3 transition-all duration-300 {$theme ===
        'dark'
            ? 'bg-[#111118]/50 border-[#2A2350] text-white placeholder:text-[#5A5A7A] focus:border-[#8B5CF6] focus:ring-4 focus:ring-[#8B5CF6]/20'
            : 'bg-white/50 border-gray-300 text-gray-900 placeholder:text-gray-400 focus:border-[#8B5CF6] focus:ring-4 focus:ring-[#8B5CF6]/20'} focus:outline-none {className}"
    />
</div>

<style lang="scss">
    input {
        transition: all 0.3s ease;
    }
</style>
