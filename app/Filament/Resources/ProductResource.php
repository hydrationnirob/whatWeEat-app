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
use Filament\Forms\Components\Section;
use Filament\Support\Enums\Alignment;


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


                Section::make('Product Information')
                   ->description('Enter the product Information Here')
                   ->columns(2)
                   ->schema([
                    Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->placeholder(' eg: Coca Cola')
                    ->required(),
                    

                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->placeholder(' eg: coca-cola zero can')
                    ->required(),

                 

                ]),

                Section::make('Product Details')
                    ->description('Enter the product details')
                    ->columns(2)
                    ->schema([
                       
                Forms\Components\TextInput::make('unit_size')
                ->label('Unit Size') 
                ->placeholder(' eg: 500') 
                ->required(),
                
            
            Forms\Components\Select::make('unit_type')
                ->label('Unit Type')
                ->placeholder('Select the unit type')
                ->options([
                    'g' => 'g',
                    'ml' => 'ml',
                    'kg' => 'kg',
                    'l' => 'l',
                    'pcs' => 'pcs',
                ])
                ->required(),


             
            Forms\Components\TextInput::make('Product_Category')
                ->label('Product Category')
                 ->placeholder(' eg: Beverages')
                ->required(),


            Forms\Components\TextInput::make('Product_Sub_Category')
                ->placeholder(' eg: Soft Drinks')
                ->label('Product Sub Category'),
                


            
            Forms\Components\TextInput::make('bar_code')
                ->label('Bar Code')
                ->placeholder('1454748452')
                ->required(),   
            Forms\Components\RichEditor::make('description')
                ->label('Description')
                ->placeholder('Enter the description of the product')
                ->required(),
            Forms\Components\TextInput::make('price')
                ->label('Price')
                ->placeholder('eg: 100')
                ->required(),
            Forms\Components\TextInput::make('image_url')
                ->label('Image URL')
                ->required(),
    
                    ]),
               
                




                Section::make('Product Extra Information')
                    ->description(' Enter the product details')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('ingredients')
                        ->label('Ingredients')
                        ->placeholder('eg: flour, sugar, salt')
                        ->required(),
    
                    Forms\Components\BelongsToSelect::make('Category_id')
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
    



                    ]),






               
                    
                 
                
                
                    
                    
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
                    ->alignment(Alignment::Center)
                    ->searchable(),
                    

                Tables\Columns\TextColumn::make('slug')
                    ->label('slug')
                    ->alignment(Alignment::Center)
                    ->searchable(),
                   
                    
                Tables\Columns\TextColumn::make('unit_size')
                    ->label('Unit Size')
                    ->searchable()
                    ->alignment(Alignment::Center)
                    ->sortable(),


                Tables\Columns\TextColumn::make('unit_type')
                    ->label('Unit Type')
                    ->searchable()
                    ->alignment(Alignment::Center)
                    ->sortable(),    


                Tables\Columns\TextColumn::make('Product_Category')
                    ->label('Product Category')
                    ->searchable()
                    ->alignment(Alignment::Center)
                    ->sortable(),    


                 Tables\Columns\TextColumn::make('Product_Sub_Category')
                    ->label('Product Sub Category')
                    ->searchable()
                    ->alignment(Alignment::Center)
                    ->sortable(),
                    
                

                Tables\Columns\TextColumn::make('bar_code')
                    ->label('Bar Code')
                    ->alignment(Alignment::Center)
                    ->searchable(),
                    

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->alignment(Alignment::Center)
                    ->searchable()
                    ->sortable(),

               
                    

                



                    
                

                    
                

                
                    
                
            ])




            


            ->filters([
                
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
