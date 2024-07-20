<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MerchResource\Pages;
use App\Models\Merch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;

class MerchResource extends Resource
{
    protected static ?string $model = Merch::class;

    protected static ?string $navigationIcon = 'heroicon-s-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //   title , description , tag  , price , size              
                TextInput::make('title')
                    ->label('Title')
                    ->required(),
                TextInput::make('tag')
                    ->label('Tag')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->hint(fn ($state, $component) => 'Maximum: ' . $component->getMaxLength() - strlen($state) . ' characters')
                    ->maxlength(100)
                    ->lazy()
                    ->required(),
                TextInput::make('price')
                    ->label('Price')
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->numeric()
                    ->prefix('Rp'),

                Forms\Components\Select::make('category_id')
                    ->label('Merch Category')
                    ->relationship('merchCategory', 'name_category')
                    ->required(),

                FileUpload::make('merch_cover_front')
                ->label('Image Merch Cover Front')
                ->directory('Merch-Cover')
                ->imageEditor()
                ->required()
                ->image(),

                FileUpload::make('merch_cover_back')
                ->label('Image Merch Cover Back')
                ->directory('Merch-Cover')
                ->imageEditor()
                ->imageEditorMode(2)
                ->required()
                ->image(),
                Repeater::make('merch_size')
                ->label('Sizes')
                ->schema([
                    Forms\Components\Select::make('size')
                        ->label('Size')
                        ->options([
                            'S' => 'Small',
                            'M' => 'Medium',
                            'L' => 'Large',
                            'XL' => 'Extra Large',
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('stock')
                        ->label('Stock')
                        ->numeric()
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug_merch')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tag')
                    ->label('Tag')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Price')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMerches::route('/'),
            'create' => Pages\CreateMerch::route('/create'),
            'edit' => Pages\EditMerch::route('/{record}/edit'),
        ];
    }
}
