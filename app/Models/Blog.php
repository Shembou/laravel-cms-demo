<?php

namespace App\Models;

use App\Enums\Colors;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\HeroBlock;
use App\Filament\Forms\Components\RichEditor\RichContentCustomBlocks\TableOfContentRendererBlock;
use Filament\Forms\Components\RichEditor\Models\Concerns\InteractsWithRichContent;
use Filament\Forms\Components\RichEditor\Models\Contracts\HasRichContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model implements HasRichContent
{
    use HasFactory, InteractsWithRichContent;
    protected $fillable = [
        'title',
        'description',
        'content',
        'slug',
        'is_published',
        'author_id',
    ];

    protected $casts = [
        'content' => 'array'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function setUpRichContent():void
    {
        $this->registerRichContent('content')
                    ->json()
                    ->textColors(Colors::getSelectOptions())
                    ->customBlocks([
                        HeroBlock::class,
                        TableOfContentRendererBlock::class
                    ])
                    ->fileAttachmentsDisk('public')
                    ->customTextColors();
    }
}
