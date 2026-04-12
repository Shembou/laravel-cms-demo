<script lang="ts">
    import { theme } from '@/stores/theme';

    let {
        type = 'Primary',
        href = '#',
        onclick,
        disabled = false,
        children,
    }: {
        type?: 'Primary' | 'Secondary' | 'Submit';
        href?: string;
        onclick?: () => void;
        disabled?: boolean;
        children: any;
    } = $props();

    const typeClasses = $derived(
        type === 'Primary' || type === 'Submit'
            ? 'bg-gradient-to-r from-[#7C3AED] to-[#8B5CF6] text-white'
            : `bg-transparent border-2 ${$theme === 'dark' ? 'border-[#f49ef8] text-[#f49ef8]' : 'border-[#cf3ec2] text-[#d626c7]'}`,
    );

    const hoverClasses = $derived(
        type === 'Primary' || type === 'Submit'
            ? 'hover:from-[#6D28D9] hover:to-[#7C3AED]'
            : `${$theme === 'dark' ? 'hover:bg-[#f49ef8]/10 hover:border-[#f49ef8] hover:text-[#C4B5FD]' : 'hover:bg-[#cf3ec2]/10 hover:border-[#Aad2ba2] hover:text-[#d626c7]'}`,
    );
</script>

{#if type === 'Submit'}
    <button
        {onclick}
        {disabled}
        class="button-wrapper group relative px-8 py-4 rounded-2xl font-mulish-black text-lg shadow-2xl overflow-hidden {typeClasses} {hoverClasses} {disabled
            ? 'disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none'
            : ''}"
    >
        <span class="relative z-10">{@render children()}</span>
    </button>
{:else}
    <a
        {href}
        class="button-wrapper group relative px-8 py-4 rounded-2xl font-mulish-black text-lg shadow-2xs overflow-hidden {typeClasses} {hoverClasses}"
    >
        <span class="relative z-10">{@render children()}</span>
    </a>
{/if}

<style lang="scss">
    .button-wrapper {
        transition: all 0.3s ease;
    }

    .button-wrapper:hover:not(:disabled) {
        transform: scale(1.05);
        box-shadow: 0 20px 20px -12px rgba(139, 92, 246, 0.5);
    }

    .button-wrapper:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none !important;
    }
</style>
