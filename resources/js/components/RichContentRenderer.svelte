<script lang="ts">
    import TableOfContentRenderer from './TableOfContentRenderer.svelte';

    let { content }: { content: any } = $props();

    function renderTextWithMarks(textNode: any): string {
        let content = textNode.text || '';

        if (!textNode.marks || textNode.marks.length === 0) {
            return content;
        }

        let result = content;

        for (const mark of textNode.marks) {
            switch (mark.type) {
                case 'link': {
                    const { href, target } = mark.attrs || {};
                    result = `<a href="${href}" ${target ? `target="${target}"` : ''} class="text-blue-600 hover:text-blue-800 underline">${result}</a>`;
                    break;
                }

                case 'bold':
                    result = `<strong>${result}</strong>`;
                    break;

                case 'italic':
                    result = `<em>${result}</em>`;
                    break;

                case 'textColor': {
                    const color = mark.attrs?.['data-color'];
                    result = `<span style="color: ${color}">${result}</span>`;
                    break;
                }

                default:
                    break;
            }
        }

        return result;
    }
    function renderNode(node: any): string {
        if (!node) return '';

        switch (node.type) {
            case 'paragraph': {
                const text =
                    node.content?.map(renderTextWithMarks).join('') || '';

                return `<p class="mb-4 ${node.attrs?.textAlign === 'start' ? 'text-left' : ''}">
                    ${text}
                </p>`;
            }

            case 'heading': {
                const text =
                    node.content?.map(renderTextWithMarks).join('') || '';

                const level = node.attrs?.level || 1;

                const classes: Record<number, string> = {
                    1: 'text-3xl font-bold mb-4',
                    2: 'text-2xl font-bold mb-3',
                    3: 'text-xl font-bold mb-2',
                };

                return `<h${level} class="${classes[level] || classes[1]}">${text}</h${level}>`;
            }

            case 'bulletList': {
                const items = node.content?.map(renderNode).join('') || '';
                return `<ul class="list-disc list-inside mb-4 ml-4">${items}</ul>`;
            }

            case 'orderedList': {
                const items = node.content?.map(renderNode).join('') || '';
                return `<ol class="list-decimal list-inside mb-4 ml-4">${items}</ol>`;
            }

            case 'listItem': {
                const content = node.content?.map(renderNode).join('') || '';
                return `<li class="mb-1">${content}</li>`;
            }

            default:
                return '';
        }
    }
    function renderBlocks(node: any): any[] {
        if (!node) return [];

        if (node.type === 'doc') {
            return node.content?.flatMap(renderBlocks) || [];
        }

        if (node.type === 'customBlock') {
            const id = node.attrs?.id;

            if (id === 'table_of_content_renderer') {
                const nestedContent = node.attrs?.config?.content;

                if (nestedContent) {
                    return [
                        {
                            type: 'component',
                            component: 'toc',
                            props: { content: nestedContent },
                        },
                    ];
                }
            }

            return [];
        }

        return [
            {
                type: 'html',
                content: renderNode(node),
            },
        ];
    }
    let blocks = $derived(renderBlocks(content));
    const componentMap: Record<string, any> = {
        toc: TableOfContentRenderer,
    };
</script>

<div class="rich-content-container prose prose-lg max-w-none">
    {#each blocks as block}
        {#if block.type === 'html'}
            {@html block.content}
        {:else if block.type === 'component'}
            {#if componentMap[block.component]}
                {@const Component = componentMap[block.component]}
                <div
                    class="custom-block-wrapper mb-6 p-4 bg-gray-50 rounded-lg"
                >
                    <Component {...block.props} />
                </div>
            {/if}
        {/if}
    {/each}
</div>
