<?php

namespace App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks;

use App\Filament\Helpers\ImageHelper;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor\RichContentCustomBlock;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;

class HeroBlock extends RichContentCustomBlock
{
    public static function getId(): string
    {
        return 'home_hero';
    }

    public static function getLabel(): string
    {
        return 'Sekcja Hero dla strony głównej';
    }

    public static function configureEditorAction(Action $action): Action
    {
        return $action
            ->modalDescription('Zmień zawartość sekcji Hero.')
            ->schema([
                TextInput::make('heading')
                    ->label("Nagłówek")
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label("Opis")
                    ->columnSpanFull(),
                Section::make('Przycisk')
                    ->schema([
                        TextInput::make("content")
                            ->label('Zawartość'),
                        TextInput::make("link")
                            ->label('Link'),
                        Toggle::make("is_primary")
                            ->label('Czy jest to przycisk główny')
                            ->onColor('custom-primary')
                            ->offColor('custom-secondary'),
                    ]),
                FileUpload::make('image')
                    ->label('zdjęcie')
                    ->disk('public')
            ]);
    }

    public static function toPreviewHtml(array $config): string
    {
        $buttonView = view('filament.forms.components.common.button', [
            'content' => $config['content'],
            'link' => $config['link'],
            'is_primary' => $config['is_primary'],
        ]);

        $imageUrl = ImageHelper::getImageUrlStorageFromConfig($config['image']);

        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.hero.preview', [
            'heading' => $config['heading'],
            'description' => $config['description'],
            'button' => $buttonView,
            'image' => $imageUrl,
        ])->render();
    }

    public static function toHtml(array $config, array $data): string
    {
        $buttonView = view('filament.forms.components.common.button', [
            'content' => $config['content'],
            'link' => $config['link'],
            'is_primary' => $config['is_primary'],
        ]);

        $imageUrl = ImageHelper::getImageUrlStorageFromConfig($config['image']);

        return view('filament.forms.components.rich-editor.rich-content-custom-blocks.hero.index', [
            'heading' => $config['heading'],
            'description' => $config['description'],
            'button' => $buttonView,
            'image' => $imageUrl,
        ])->render();
    }
}
