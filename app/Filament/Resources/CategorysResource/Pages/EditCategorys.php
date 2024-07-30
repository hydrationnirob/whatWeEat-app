<?php

namespace App\Filament\Resources\CategorysResource\Pages;

use App\Filament\Resources\CategorysResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategorys extends EditRecord
{
    protected static string $resource = CategorysResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
