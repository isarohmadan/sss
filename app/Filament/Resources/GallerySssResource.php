<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GallerySssResource\Pages;
use App\Filament\Resources\GallerySssResource\RelationManagers;
use App\Models\gallery_sss as GallerySss;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GallerySssResource extends Resource
{
    protected static ?string $model = GallerySss::class;

    protected static ?string $navigationLabel = 'Category Events SSS';
    protected static ?string $pluralModelLabel  = 'Events Category';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title Event')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\FileUpload::make('image_cover_path')
                    ->label('Cover')
                    ->directory('Gallery_Cover')
                    ->imageEditor()
                    ->required()
                    ->image(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title Event')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image_cover_path')
                    ->label('Cover')

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
            'index' => Pages\ListGallerySsses::route('/'),
            'create' => Pages\CreateGallerySss::route('/create'),
            'edit' => Pages\EditGallerySss::route('/{record}/edit'),
        ];
    }
}
