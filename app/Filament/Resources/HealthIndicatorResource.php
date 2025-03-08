<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HealthIndicatorResource\Pages;
use App\Filament\Resources\HealthIndicatorResource\RelationManagers;
use App\Models\HealthIndicator;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HealthIndicatorResource extends Resource
{
    protected static ?string $model = HealthIndicator::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-minus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                ->relationship('patient', 'name'),
                Forms\Components\TextInput::make('blood_sugar')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('hba1c')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('weight')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('oxygen')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('tension')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('dates')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('patient_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('blood_sugar')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hba1c')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('weight')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('oxygen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tension')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dates')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListHealthIndicators::route('/'),
            'create' => Pages\CreateHealthIndicator::route('/create'),
            'edit' => Pages\EditHealthIndicator::route('/{record}/edit'),
        ];
    }
}
