<script lang="ts">
    import Layout from '@/Layout.svelte';
    import AppHead from '@/components/AppHead.svelte';
    import RichContentRenderer from '@/components/RichContentRenderer.svelte';

    interface Page {
        content: any;
        description: string;
        title: string;
    }

    interface Props {
        page: Page;
    }

    let { currentRoute, page }: { currentRoute: string; page: IPageProps } =
        $props();
    let { content, description, title } = page;
</script>

<AppHead {title}>{description}</AppHead>

<Layout {currentRoute}>
    <RichContentRenderer {content} />
</Layout>
