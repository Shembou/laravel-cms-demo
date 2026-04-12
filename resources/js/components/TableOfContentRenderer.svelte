<script lang="ts">
    let { content }: { content: any } = $props();

    function renderTextWithMarks(textNode: any) {
        let content = textNode.text || '';

        if (!textNode.marks || textNode.marks.length === 0) {
            return content;
        }

        let result = content;
        const marks = textNode.marks;

        for (const mark of marks) {
            switch (mark.type) {
                case 'link':
                    const { href, target } = mark.attrs;
                    result = `<a href="${href}" ${target ? `target="${target}"` : ''} class="text-blue-600 hover:text-blue-800 underline">${result}</a>`;
                    break;
                case 'bold':
                    result = `<strong>${result}</strong>`;
                    break;
                case 'textColor':
                    const color = mark.attrs['data-color'];
                    result = `<span style="color: ${color}">${result}</span>`;
                    break;
            }
        }

        return result;
    }

    function renderNode(node: any) {
        if (!node) return '';

        switch (node.type) {
            case 'paragraph':
                const textContent =
                    node.content
                        ?.map((child: any) => renderTextWithMarks(child))
                        .join('') || '';
                return `<p class="mb-4 ${node.attrs?.textAlign === 'start' ? 'text-left' : ''}">${textContent}</p>`;

            case 'heading':
                const headingContent =
                    node.content
                        ?.map((child: any) => renderTextWithMarks(child))
                        .join('') || '';
                const level = node.attrs?.level || 1;
                const headingClasses = {
                    1: 'text-3xl font-bold mb-4',
                    2: 'text-2xl font-bold mb-3',
                    3: 'text-xl font-bold mb-2',
                };
                return `<h${level} class="${headingClasses[level] || headingClasses[1]}">${headingContent}</h${level}>`;

            case 'bulletList':
                const listItems =
                    node.content
                        ?.map((item: any) => renderNode(item))
                        .join('') || '';
                return `<ul class="list-disc list-inside mb-4 ml-4">${listItems}</ul>`;

            case 'listItem':
                const itemContent =
                    node.content
                        ?.map((child: any) => renderNode(child))
                        .join('') || '';
                return `<li class="mb-1">${itemContent}</li>`;

            case 'doc':
                return (
                    node.content
                        ?.map((child: any) => renderNode(child))
                        .join('') || ''
                );

            default:
                return '';
        }
    }
</script>

{@html renderNode(content)}
