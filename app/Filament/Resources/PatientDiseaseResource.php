<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientDiseaseResource\Pages;
use App\Filament\Resources\PatientDiseaseResource\RelationManagers;
use App\Models\PatientDisease;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientDiseaseResource extends Resource
{
    protected static ?string $model = PatientDisease::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('patient_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('disease_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('diagnosed_at')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('patient_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('disease_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('diagnosed_at')
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
            'index' => Pages\ListPatientDiseases::route('/'),
            'create' => Pages\CreatePatientDisease::route('/create'),
            'edit' => Pages\EditPatientDisease::route('/{record}/edit'),
        ];
    }
}
