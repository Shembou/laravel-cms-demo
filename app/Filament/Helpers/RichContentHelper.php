<?php

namespace App\Filament\Helpers;

class RichContentHelper
{
    /**
     * Render TipTap rich content JSON to HTML
     *
     * @param array $nodes Array of TipTap content nodes
     * @return string HTML representation of the content
     */
    public static function renderRichContent(array $nodes): string
    {
        $html = '';

        foreach ($nodes as $node) {
            $html .= self::renderNode($node);
        }

        return $html;
    }

    /**
     * Render a single TipTap node to HTML
     *
     * @param array $node The TipTap node to render
     * @return string HTML representation of the node
     */
    protected static function renderNode(array $node): string
    {
        $type = $node['type'] ?? null;
        $content = $node['content'] ?? [];
        $attrs = $node['attrs'] ?? [];

        return match ($type) {
            'paragraph' => self::renderParagraph($node, $content, $attrs),
            'heading' => self::renderHeading($node, $content, $attrs),
            'bulletList' => self::renderBulletList($content),
            'orderedList' => self::renderOrderedList($content),
            'listItem' => self::renderListItem($content),
            'text' => self::renderText($node),
            'image' => self::renderImage($attrs),
            'hardBreak' => '<br>',
            default => !empty($content) ? self::renderRichContent($content) : '',
        };
    }

    /**
     * Render a paragraph node
     */
    protected static function renderParagraph(array $_node, array $content, array $attrs): string
    {
        $textAlign = $attrs['textAlign'] ?? 'start';
        $inlineContent = self::renderInlineContent($content);

        $style = match ($textAlign) {
            'center' => 'text-align: center;',
            'end' => 'text-align: right;',
            'justify' => 'text-align: justify;',
            default => 'text-align: left;',
        };

        if (empty(trim($inlineContent))) {
            return '<p style="' . $style . '">&nbsp;</p>';
        }

        return '<p style="' . $style . '">' . $inlineContent . '</p>';
    }

    /**
     * Render a heading node
     */
    protected static function renderHeading(array $_node, array $content, array $attrs): string
    {
        $level = $attrs['level'] ?? 1;
        $textAlign = $attrs['textAlign'] ?? 'start';
        $inlineContent = self::renderInlineContent($content);

        $style = match ($textAlign) {
            'center' => 'text-align: center;',
            'end' => 'text-align: right;',
            'justify' => 'text-align: justify;',
            default => 'text-align: left;',
        };

        // Extract text for ID generation
        $text = self::extractTextFromContent($content);
        $id = self::slugify($text);

        return '<h' . $level . ' id="' . e($id) . '" style="' . $style . '">' . $inlineContent . '</h' . $level . '>';
    }

    /**
     * Render a bullet list node
     */
    protected static function renderBulletList(array $content): string
    {
        $items = '';
        foreach ($content as $item) {
            $items .= self::renderNode($item);
        }

        return '<ul>' . $items . '</ul>';
    }

    /**
     * Render an ordered list node
     */
    protected static function renderOrderedList(array $content): string
    {
        $items = '';
        foreach ($content as $item) {
            $items .= self::renderNode($item);
        }

        return '<ol>' . $items . '</ol>';
    }

    /**
     * Render a list item node
     */
    protected static function renderListItem(array $content): string
    {
        $itemContent = '';
        foreach ($content as $child) {
            $itemContent .= self::renderNode($child);
        }

        return '<li>' . $itemContent . '</li>';
    }

    /**
     * Render inline content (text with marks)
     */
    protected static function renderInlineContent(array $content): string
    {
        $html = '';
        foreach ($content as $node) {
            $html .= self::renderNode($node);
        }
        return $html;
    }

    /**
     * Render a text node with marks (formatting)
     */
    protected static function renderText(array $node): string
    {
        $text = $node['text'] ?? '';
        $marks = $node['marks'] ?? [];

        // Escape the raw text first
        $text = e($text);

        // Apply marks from the inside out (reverse order)
        foreach (array_reverse($marks) as $mark) {
            $markType = $mark['type'] ?? null;
            $markAttrs = $mark['attrs'] ?? [];

            $text = self::applyMark($text, $markType, $markAttrs);
        }

        return $text;
    }

    /**
     * Apply a formatting mark to text
     */
    protected static function applyMark(string $text, string $markType, array $markAttrs): string
    {
        return match ($markType) {
            'bold' => '<strong>' . $text . '</strong>',
            'italic' => '<em>' . $text . '</em>',
            'underline' => '<u>' . $text . '</u>',
            'strike' => '<s>' . $text . '</s>',
            'code' => '<code>' . $text . '</code>',
            'link' => self::renderLink($text, $markAttrs),
            'textColor' => self::renderTextColor($text, $markAttrs),
            default => $text,
        };
    }

    /**
     * Render a link with optional attributes
     */
    protected static function renderLink(string $text, array $attrs): string
    {
        $href = $attrs['href'] ?? '#';
        $target = $attrs['target'] ?? null;
        $rel = $attrs['rel'] ?? null;
        $class = $attrs['class'] ?? null;

        $attributes = 'href="' . e($href) . '"';

        if ($target) {
            $attributes .= ' target="' . e($target) . '"';
        }

        if ($rel) {
            $attributes .= ' rel="' . e($rel) . '"';
        }

        if ($class) {
            $attributes .= ' class="' . e($class) . '"';
        }

        return '<a ' . $attributes . '>' . $text . '</a>';
    }

    /**
     * Render text with color
     */
    protected static function renderTextColor(string $text, array $attrs): string
    {
        $color = $attrs['data-color'] ?? null;

        if (!$color) {
            return $text;
        }

        return '<span style="color: ' . e($color) . ';">' . $text . '</span>';
    }

    /**
     * Render an image node
     */
    protected static function renderImage(array $attrs): string
    {
        $src = $attrs['src'] ?? '';
        $alt = $attrs['alt'] ?? '';
        $title = $attrs['title'] ?? null;
        $width = $attrs['width'] ?? null;
        $height = $attrs['height'] ?? null;

        $attributes = 'src="' . e($src) . '" alt="' . e($alt) . '"';

        if ($title) {
            $attributes .= ' title="' . e($title) . '"';
        }

        if ($width) {
            $attributes .= ' width="' . e($width) . '"';
        }

        if ($height) {
            $attributes .= ' height="' . e($height) . '"';
        }

        $attributes .= ' style="max-width: 100%; height: auto;"';

        return '<img ' . $attributes . ' />';
    }

    /**
     * Extract headings from TipTap content for table of contents
     *
     * @param array $nodes Array of TipTap content nodes
     * @return array Array of headings with id and text
     */
    public static function extractHeadings(array $nodes): array
    {
        $headings = [];
        self::extractHeadingsRecursive($nodes, $headings);
        return $headings;
    }

    /**
     * Recursively extract headings from TipTap content
     *
     * @param array $nodes Array of TipTap content nodes
     * @param array &$headings Reference to headings array to populate
     */
    protected static function extractHeadingsRecursive(array $nodes, array &$headings): void
    {
        foreach ($nodes as $node) {
            $type = $node['type'] ?? null;
            $content = $node['content'] ?? [];

            if ($type === 'heading') {
                $text = self::extractTextFromContent($content);
                if (!empty($text)) {
                    $headings[] = [
                        'id' => self::slugify($text),
                        'text' => $text,
                        'level' => $node['attrs']['level'] ?? 1,
                    ];
                }
            }

            // Recursively search in nested content
            if (!empty($content)) {
                self::extractHeadingsRecursive($content, $headings);
            }
        }
    }

    /**
     * Extract plain text from TipTap content nodes
     *
     * @param array $content Array of content nodes
     * @return string The extracted text
     */
    protected static function extractTextFromContent(array $content): string
    {
        $text = '';

        foreach ($content as $node) {
            if (isset($node['text'])) {
                $text .= $node['text'];
            }

            if (isset($node['content'])) {
                $text .= self::extractTextFromContent($node['content']);
            }
        }

        return $text;
    }

    /**
     * Convert text to a URL-friendly slug
     *
     * @param string $text The text to slugify
     * @return string The slugified text
     */
    public static function slugify(string $text): string
    {
        // Replace non-alphanumeric characters (except spaces and hyphens) with empty string
        $slug = preg_replace('/[^\w\s-]/u', '', $text);

        // Replace spaces with hyphens
        $slug = preg_replace('/\s+/u', '-', $slug);

        // Convert to lowercase
        $slug = mb_strtolower($slug);

        // Remove consecutive hyphens
        $slug = preg_replace('/-+/', '-', $slug);

        // Trim hyphens from start and end
        $slug = trim($slug, '-');

        return $slug ?: 'section';
    }
}