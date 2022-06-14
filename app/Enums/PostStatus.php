<?php

namespace App\Enums;

enum PostStatus: string
{
    case DRAFT = 'draft';
    case PENDING = 'pending';
    case PUBLISHED = 'published';

    public function getLabel(): string
    {
        return match ($this) {
            self::DRAFT => __('resources/post.draft'),
            self::PENDING => __('resources/post.pending'),
            self::PUBLISHED => __('resources/post.published'),
            default => str($this->value)->replace('_', ' ')->ucfirst()->toString(),
        };
    }
}
