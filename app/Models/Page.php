<?php

namespace App\Models;

use App\Enums\Colors;
use App\Enums\TextColors;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\TableOfContentRendererBlock;
use Filament\Forms\Components\RichEditor\Models\Concerns\InteractsWithRichContent;
use Filament\Forms\Components\RichEditor\Models\Contracts\HasRichContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model implements HasRichContent
{
    use HasFactory, InteractsWithRichContent;
    protected $fillable = [
        'title',
        'description',
        'slug',
        'content',
        'is_published',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    public function setUpRichContent():void
    {
        $this->registerRichContent('content')
                    ->json()
                    ->textColors(Colors::getSelectOptions())
                    ->customBlocks([
                        TableOfContentRendererBlock::class,
                        HeroBlock::class,
                    ])
                    ->fileAttachmentsDisk('public')
                    ->customTextColors();
    }
}
