<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiseaseResource\Pages;
use App\Filament\Resources\DiseaseResource\RelationManagers;
use App\Models\Disease;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiseaseResource extends Resource
{
    protected static ?string $model = Disease::class;

    protected static ?string $navigationIcon = 'heroicon-s-arrow-left-end-on-rectangle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('Enter the name of the disease')
                    ->maxLength(255),
                Textarea::make('symptoms')
                    ->required()
                    ->placeholder('Enter the symptoms of the disease'),
                Textarea::make('description')
                    ->placeholder('Enter the description of the disease')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('symptoms')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListDiseases::route('/'),
            'create' => Pages\CreateDisease::route('/create'),
            'edit' => Pages\EditDisease::route('/{record}/edit'),
        ];
    }
}
