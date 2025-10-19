<?php

namespace App\Filament\Admin\Resources\Categories\Pages;


use App\Filament\Admin\Resources\Categories\CategoryResource;
use App\Models\Category;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use App\Models\Attachment;
use Illuminate\Support\Str;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function afterCreate(): void
    {
        $image = $this->form->getComponent('image')->getState();
        $alt = $this->form->getComponent('alt')->getState();
        $disk = config('filesystems.default', 'public');

        if (isset($image)) {
            $this->record->attachment()->create([
                'disk' => $disk,
                'path' => 'category/'. $image,
                'name' => pathinfo($image, PATHINFO_FILENAME),
                'size' => Storage::disk($disk)->size($image),
                'mime_type' => Storage::disk($disk)->mimeType($image),
                'alt' => $alt,
            ]);
        }
    }
}
