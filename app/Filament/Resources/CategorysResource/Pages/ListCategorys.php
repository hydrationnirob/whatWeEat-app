<?php

namespace App\Filament\Resources\CategorysResource\Pages;

use App\Filament\Resources\CategorysResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategorys extends ListRecords
{
    protected static string $resource = CategorysResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
