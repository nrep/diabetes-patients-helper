<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    public static function form(Form $form): Form
    {
        return $form
        ->columns(1)
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Patient Information')
                        ->columns(2)
                        ->icon('heroicon-s-user')
                        ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->placeholder('Enter the name of the patient')
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->placeholder('Enter the address of the patient')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                ->placeholder('Enter 10 digit phone number')
                    ->tel()
                    ->numeric()
                    ->maxLength(10)
                    ->default(null),
                DatePicker::make('age')
                    ->required()
                    ->maxDate('today'),
                    
                Select::make('gender')
                ->options([
                    'M' => 'Male',
                    'F' => 'Female'
                ]),
                Forms\Components\TextInput::make('username')
                    ->required()
                    ->placeholder('Enter the username')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                ->placeholder('Enter the email address')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->placeholder('Enter the password')
                    ->required()
                    ->maxLength(255),
            ]),
            Wizard\Step::make('Desease Information')
            ->columns(2)            
            ->icon('heroicon-s-adjustments-horizontal')
            ->schema([

                Select::make('disease_id')
                ->options(\App\Models\Disease::pluck('name', 'id')->toArray())
                    ->required(),

                DatePicker::make('diagnosed_at')
                    ->maxDate('today')
                    ->default(null),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),

                
            ]),

                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
