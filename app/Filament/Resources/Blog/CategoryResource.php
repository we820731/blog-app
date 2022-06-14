<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\CategoryResource\Pages;
use App\Models\Blog\Category;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

// use App\Filament\Resources\CategoryResource\RelationManagers;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-collection';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('resources/category.name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('icon')
                    ->label(__('resources/category.icon'))
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label(__('resources/category.description'))
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('resources/category.name')),
                Tables\Columns\TextColumn::make('icon')->label(__('resources/category.icon')),
                Tables\Columns\TextColumn::make('description')->label(__('resources/category.description')),
                Tables\Columns\TextColumn::make('post_count')->label(__('resources/category.post_count')),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit'   => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('resources/category.label');
    }

    public static function getPluralLabel(): string
    {
        return __('resources/category.label');
    }
}
