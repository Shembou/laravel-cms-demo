<script lang="ts">
    import type { Snippet } from 'svelte';
    import Header from '@/components/Header.svelte';
    import Footer from '@/components/Footer.svelte';
    import { Toaster } from './components/ui/sonner';

    let {
        currentRoute,
        children,
    }: { currentRoute: string; children: Snippet } = $props();
</script>

<!-- <Header {currentRoute} /> -->
<main>
    {@render children()}
</main>
<!-- <Footer /> -->
<Toaster />
