<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use Filament\Widgets\ChartWidget;

class ProductCheat extends ChartWidget
{
    protected static ?string $heading = 'Product Cheat';

    protected function getData(): array
    {

        $products = \App\Models\Product::all();


        return [
            'datasets' => [
                [
                    'label' => 'New Product created',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
