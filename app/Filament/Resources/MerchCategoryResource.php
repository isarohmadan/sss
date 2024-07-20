<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MerchCategoryResource\Pages;
use App\Models\Merch_Category as MerchCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MerchCategoryResource extends Resource
{
    protected static ?string $model = MerchCategory::class;
    protected static ?string $navigationLabel = 'Merch Category';
    protected static ?string $pluralModelLabel  = 'Merch Category';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('name_category')
                ->label('Category Title')
                ->live(onBlur: true)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug_category', Str::slug($state)))
                ->required(),
            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name_category')
                ->label('Title Event')
                ->searchable()
                ->sortable(),
                TextColumn::make('slug_category')
                ->label('Slug')
                ->searchable()
                ->sortable(),
                TextColumn::make('description')
                ->label('Description')
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
            'index' => Pages\ListMerchCategories::route('/'),
            'create' => Pages\CreateMerchCategory::route('/create'),
            'edit' => Pages\EditMerchCategory::route('/{record}/edit'),
        ];
    }
}
