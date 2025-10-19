<?php

namespace App\Filament\Admin\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

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
                    ->default(fn (mixed $record): ?string => $record?->attachment?->alt),
                Textarea::make('description')
                    ->columnSpanFull(),

            ]);
    }
}
