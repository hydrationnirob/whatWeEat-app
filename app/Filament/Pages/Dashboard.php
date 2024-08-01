<?php
 
namespace App\Filament\Pages;
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard\Actions\FilterAction;
 
class Dashboard extends \Filament\Pages\Dashboard
{


    protected static ?string $title = 'Dashboard';
    protected static string $routePath = '/dashboard';

    

    public function getWidgets(): array
    {
        return [
            \App\Filament\Resources\ProductResource\Widgets\ProductOverview::class,
            \App\Filament\Resources\ProductResource\Widgets\ProductCheat::class,
            
        ];
    }
}