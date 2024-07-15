<?php

namespace App\Filament\Resources\ApplyJobResource\Pages;

use App\Filament\Resources\ApplyJobResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApplyJob extends EditRecord
{
    protected static string $resource = ApplyJobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
