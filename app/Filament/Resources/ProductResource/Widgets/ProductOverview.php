<?php


 

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Brand;
use App\Models\categorys;
use App\Models\Country;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Model;

class ProductOverview extends BaseWidget
{ 
  
    
    
    protected function getStats(): array
    {
    

        $product = Product::all();
        $brand = Brand::all();
        $Category = categorys::all();
        $Country = Country::all();
        $user = User::all();

        return [


            Stat::make('Total Users', $user->count())
                -> description( 'Total number of users in the database')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),


            Stat::make('Total Product', $product->count())
             -> description( 'Total number of products in the database')
             ->chart([1, 2, 12, 3, 15, 5, 17])
             ->color('info'),
            
             

            Stat::make('Total Brands', $brand->count())
             -> description( 'Total number of brands in the database')
             ->chart([7, 2, 16, 3, 30, 14, 17])
             ->color('danger'),

            Stat::make('Total Categories', $Category->count())
                -> description( 'Total number of categories in the database')
                ->chart([7, 14, 10, 3, 45, 4, 2])
                ->color('success'),



            Stat::make('Total Countries', $Country->count())
                -> description( 'Total number of countries in the database')
                ->chart([7, 2, 50, 14, 70, 4, 90])
                ->color('warning'),
            

            
             
            
            
            
            
        ];
    }
}
