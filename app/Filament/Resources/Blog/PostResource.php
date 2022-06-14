<?php

namespace App\Filament\Resources\Blog;

use App\Enums\PostStatus;
use App\Filament\Resources\Blog\PostResource\Pages;
use App\Models\Blog\Post;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $slug = 'blog/posts';

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__('resources/post.title'))
                            ->required(),
                        Forms\Components\TextInput::make('slug')
                            ->label(__('resources/post.slug'))
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\BelongsToSelect::make('category_id')
                            ->label(__('resources/post.category_id'))
                            ->relationship('category', 'name')
                            // ->searchable()
                            ->required(),
                        Forms\Components\MarkdownEditor::make('content')
                            ->label(__('resources/post.content'))
                            ->columnSpan('full'),
                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Textarea::make('introduce')
                            ->label(__('resources/post.introduce')),
                        Forms\Components\FileUpload::make('featured_image')
                            ->label(__('resources/post.featured_image'))
                            ->image(),
                        Forms\Components\Toggle::make('is_featured')
                            ->label(__('resources/post.is_featured'))
                            ->inline(false)
                            ->onIcon('heroicon-s-lightning-bolt')
                            ->offIcon('heroicon-s-star')
                            ->required(),
                        Forms\Components\Select::make('status')
                            ->label(__('resources/post.status'))
                            ->options(
                                collect(
                                    PostStatus::cases())->mapWithKeys(fn(PostStatus $category): array => [$category->value => $category->getLabel($category->value),
                                ]))
                            ->required(),
                        Forms\Components\DatePicker::make('published_at')
                            ->label(__('resources/post.published_at')),
                    ])
                    ->columnSpan(1),
            ])->columns([
                'sm' => 3,
                'lg' => null,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('resources/post.user_name')),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('resources/post.title')),
                Tables\Columns\TextColumn::make('category.name')
                    ->label(__('resources/post.category_id')),
                Tables\Columns\BooleanColumn::make('is_featured')
                    ->label(__('resources/post.is_featured')),
                Tables\Columns\BadgeColumn::make('status')
                    ->label(__('resources/post.status'))
                    ->colors([
                        'danger'  => PostStatus::DRAFT->value,
                        'warning' => PostStatus::PENDING->value,
                        'success' => PostStatus::PUBLISHED->value,
                    ])
                    ->enum(collect(PostStatus::cases())->mapWithKeys(fn(PostStatus $status): array => [$status->value => $status->getLabel()]))
                    ->sortable(),
                Tables\Columns\TextColumn::make('view')
                    ->label(__('resources/post.view')),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('deleted_at')
                //     ->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options(collect(PostStatus::cases())->mapWithKeys(fn(PostStatus $status): array => [$status->value => $status->getLabel()])),
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
            'index'  => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit'   => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return __('resources/post.label');
    }

    public static function getPluralLabel(): string
    {
        return __('resources/post.label');
    }
}
