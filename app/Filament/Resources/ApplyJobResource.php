<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplyJobResource\Pages;
use App\Filament\Resources\ApplyJobResource\RelationManagers;
use App\Models\Applicant;
use App\Models\ApplyJob;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApplyJobResource extends Resource
{
    protected static ?string $model = ApplyJob::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('job_id')->maxLength(100)->required()->columnSpanFull(),
                // Forms\Components\TextInput::make('applicant_id')->maxLength(100)->required()->columnSpanFull(),
                Forms\Components\Select::make('job_id')
                    ->options(Job::all()->pluck('name', 'id'))
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Select::make('applicant_id')
                    ->options(Applicant::all()->pluck('name', 'id'))
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TextInput::make('status')->maxLength(100)->required()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job_id')->searchable(),
                Tables\Columns\TextColumn::make('applicant_id')->searchable(),
                Tables\Columns\TextColumn::make('status')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListApplyJobs::route('/'),
            'create' => Pages\CreateApplyJob::route('/create'),
            'edit' => Pages\EditApplyJob::route('/{record}/edit'),
        ];
    }
}
