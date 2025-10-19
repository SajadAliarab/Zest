<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property int $id
 * @property int $attachmentable_id
 * @property int $attachmentable_type
 * @property string $disk
 * @property string $path
 * @property string $name
 * @property int $size
 * @property string $mime_type
 * @property CarbonImmutable | null $created_at
 * @property CarbonImmutable | null $updated_at
 * @property CarbonImmutable | null $deleted_at
 */
class Attachment extends Model
{
    use HasFactory;

    public function url()
    {
        return Storage::disk($this->disk)
            ->url($this->path);
    }
}
