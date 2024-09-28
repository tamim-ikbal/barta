<?php

namespace App\Models;

use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use League\CommonMark\Extension\InlinesOnly\InlinesOnlyExtension;
use League\CommonMark\Extension\Mention\MentionExtension;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'content',
        'view_count',
        'comment_count',
        'status'
    ];


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('status', PostStatus::PUBLISHED);
    }

    protected function casts(): array
    {
        return [
            'status' => PostStatus::class
        ];
    }

    public function contentMarkdown(): Attribute
    {
        return Attribute::get(function (mixed $value, array $attributes) {
            return Str::markdown(
                $attributes['content'],
                [
                    'html_input' => 'strip',
                    'allow_unsafe_links' => false,
                    'max_nesting_level' => 5,
                    'mentions' => [
                        'hashtags' => [
                            'prefix' => '#',
                            'pattern' => '[\w\$-]+',
                            'generator' =>url('#%s')
                        ]
                    ]
                ],
                [
                    new MentionExtension(),
                ]
            );
        });
    }



}
