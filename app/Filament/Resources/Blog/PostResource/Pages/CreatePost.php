<?php

namespace App\Filament\Resources\Blog\PostResource\Pages;

use App\Enums\PostStatus;
use App\Filament\Resources\Blog\PostResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
    protected bool $shouldCreateAsDraft = false;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['status'] = $this->shouldCreateAsDraft ?
            PostStatus::DRAFT :
            PostStatus::PENDING;

        $data['user_id'] = auth()->user()->getKey();
        // dd($data);
        return $data;
    }
}
