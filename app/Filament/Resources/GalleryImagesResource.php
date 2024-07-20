<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryImagesResource\Pages;
use App\Filament\Resources\GalleryImagesResource\RelationManagers;
use App\Models\gallery_sss_images as GalleryImages;
use Filament\Forms\Components\Repeater;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryImagesResource extends Resource
{

    protected static ?string $model = GalleryImages::class;

    protected static ?string $navigationLabel = 'Image Events SSS';
    protected static ?string $pluralModelLabel  = 'Events Image';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title Image'),
                Forms\Components\Select::make('sss_gallery_category_id')
                    ->label('Gallery SSS')
                    ->relationship('gallery_sss', 'title')
                    ->required(),
                
                Repeater::make('image_path')
                ->label('Images')
                ->schema([
                    Forms\Components\FileUpload::make('image_path')
                    ->label('Image')
                    ->directory('Event_Gallery')
                    ->imageEditor()
                    ->required()
                    ->image(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListGalleryImages::route('/'),
            'create' => Pages\CreateGalleryImages::route('/create'),
            'edit' => Pages\EditGalleryImages::route('/{record}/edit'),
        ];
    }
}
