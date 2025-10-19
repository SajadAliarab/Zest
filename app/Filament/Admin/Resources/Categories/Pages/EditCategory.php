<?php

namespace App\Filament\Admin\Resources\Categories\Pages;

use App\Filament\Admin\Resources\Categories\CategoryResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function afterSave(): void
    {
        $image = $this->form->getComponent('image')->getState();
        $disk = config('filesystems.default', 'public');
        $alt = $this->form->getComponent('alt')->getState();

        // If no new image uploaded, skip
        if (!$image) {
            return;
        }

        // Remove old attachment if exists
        if ($this->record->attachment) {
            // Optional: also delete old file from storage
            if (Storage::disk($this->record->attachment->disk)->exists($this->record->attachment->path)) {
                Storage::disk($this->record->attachment->disk)->delete($this->record->attachment->path);
            }

            $this->record->attachment->delete();
        }

        // Create new attachment record
        $this->record->attachment()->create([
            'disk' => $disk,
            'path' => 'category/' . $image,
            'name' => pathinfo($image, PATHINFO_FILENAME),
            'size' => Storage::disk($disk)->size($image),
            'mime_type' => Storage::disk($disk)->mimeType($image),
            'alt'=> $alt
        ]);
    }
}
