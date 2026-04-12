<script lang="ts">
    import AppHead from '@/components/AppHead.svelte';
    import Layout from '@/Layout.svelte';
    let { currentRoute }: { currentRoute: string } = $props();
</script>

<AppHead title="Welcome">
    <link rel="preconnect" href="https://rsms.me/" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
</AppHead>
<Layout {currentRoute}>""</Layout>
