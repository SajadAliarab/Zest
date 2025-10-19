<?php

namespace App\Filament\Admin\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                Select::make('parent_id')
                    ->relationship('parent', 'name'),
                FileUpload::make('image')
                    ->image()
                    ->maxSize(5120)
                    ->dehydrated(false),
                TextInput::make('alt')
                    ->nullable()
                    ->label('Alternative text for image')
                    ->dehydrated(false)
                    ->default(fn ($record) => $record?->attachment?->alt),
                Textarea::make('description')
                    ->columnSpanFull(),

            ]);
    }
}
