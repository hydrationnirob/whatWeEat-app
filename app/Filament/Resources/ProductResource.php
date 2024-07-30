<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box-arrow-down';
    protected static ?string $pluralModelLabel = 'All Products';

    public static string $resource = ProductResource::class;
    protected static ?string $activeNavigationIcon = 'heroicon-o-document-text';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required(),
                Forms\Components\TextInput::make('display_name')
                    ->label('Display Name'),
                
                Forms\Components\TextInput::make('bar_code')
                    ->label('Bar Code')
                    ->required(),   
                Forms\Components\TextInput::make('description')
                    ->label('Description')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->required(),
                Forms\Components\TextInput::make('image_url')
                    ->label('Image URL')
                    ->required(),
                Forms\Components\TextInput::make('ingredients')
                    ->label('Ingredients')
                    ->required(),

                Forms\Components\BelongsToSelect::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Category')
                    ->required(),

                Forms\Components\BelongsToSelect::make('brand_id')
                    ->relationship('brand', 'name')
                    ->label('Brand')
                    ->required(),

                Forms\Components\BelongsToSelect::make('country_id')
                    ->relationship('country', 'name')
                    ->label('Country')
                    ->required(),

                    
                 
                
                
                    
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),


                Tables\Columns\TextColumn::make('bar_code')
                    ->label('Bar Code')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->searchable()
                    ->sortable(),

               
                Tables\Columns\TextColumn::make('category_id')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('brand_id')
                    ->label('Brand')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('country_id')
                    ->label('Country')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
    public static function getWidgets(): array
    {
        return [
             ProductResource\Widgets\ProductOverview::class,
           

        ];
    }



    public static function getNavigationBadge(): ?string
{
    return static::getModel()::count();
}











}
