<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use App\Enums\Colors;
use App\Enums\TextColors;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\RichEditor\ToolbarButtonGroup;
use Filament\Support\Enums\Width;

class TableOfContentRendererBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'table_of_content_renderer';
    }

    public static function getLabel(): string
    {
        return 'Blok generujący spis treści';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Z danego schematu wygeneruje się spis treści.')
            ->schema([
                RichEditor::make('content')
                    ->json()
                    ->toolbarButtons(
                        [
                            ['bold', 'italic', 'underline', 'strike', 'link'],
                            [ToolbarButtonGroup::make('Paragraph', ['paragraph', 'h1', 'h2', 'h3'])->textualButtons()],
                            [ToolbarButtonGroup::make('Alignment', ['alignStart', 'alignCenter', 'alignEnd', 'alignJustify'])],
                            ['bulletList', 'orderedList'],
                            ['undo', 'redo'],
                            ['attachFiles'],
                            ['textColor']
                        ]
                    )
                    ->label('Zawartość')
                    ->textColors(Colors::getSelectOptions())
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('attachments')
                    ->fileAttachmentsVisibility('public')
                    ->columnSpanFull()
            ])->modalWidth(Width::FiveExtraLarge);
    }

    public static function toPreviewHtml(array $config): string
    {
        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.table-of-content-renderer.preview', [
            'content' => $config['content']
        ])->render();
    }

    public static function toHtml(array $config, array $data): string
    {
        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.table-of-content-renderer.index', [
            'content' => $config['content'] ?? null
        ])->render();
    }
}
