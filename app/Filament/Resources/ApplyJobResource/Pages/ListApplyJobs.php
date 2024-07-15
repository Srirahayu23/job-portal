<?php

namespace App\Filament\Resources\ApplyJobResource\Pages;

use App\Filament\Resources\ApplyJobResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApplyJobs extends ListRecords
{
    protected static string $resource = ApplyJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
