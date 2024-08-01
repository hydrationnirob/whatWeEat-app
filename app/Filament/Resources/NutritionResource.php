<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NutritionResource\Pages;
use App\Filament\Resources\NutritionResource\RelationManagers;
use App\Models\Nutrition;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NutritionResource extends Resource
{
    protected static ?string $model = Nutrition::class;

    protected static ?string $navigationIcon = 'heroicon-o-view-columns';
    protected static ?string $navigationGroup = 'Products Info'; 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                

               Forms\Components\BelongsToSelect::make('product_id')
                    ->relationship('product', 'name')
                    ->label('Product')
                    ->required(),
                    
                Forms\Components\TextInput::make('calories')
                    ->label('Calories')
                    ->required(),

                Forms\Components\TextInput::make('fat')
                    ->label('Fat')
                    ->required(),
                Forms\Components\TextInput::make('protein')
                    ->label('Protein')
                    ->required(),
                Forms\Components\TextInput::make('carbohydrates')
                    ->label('Carbohydrates')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Product')
                    ->searchable(),
                Tables\Columns\TextColumn::make('calories')
                    ->label('Calories'),
                Tables\Columns\TextColumn::make('fat')
                    ->label('Fat'),
                Tables\Columns\TextColumn::make('protein')
                    ->label('Protein'),
                Tables\Columns\TextColumn::make('carbohydrates')
                    ->label('Carbohydrates'),
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
            'index' => Pages\ListNutrition::route('/'),
            'create' => Pages\CreateNutrition::route('/create'),
            'edit' => Pages\EditNutrition::route('/{record}/edit'),
        ];
    }
}
