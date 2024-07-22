<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicantResource\Pages;
use App\Filament\Resources\ApplicantResource\RelationManagers;
use App\Models\Applicant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class ApplicantResource extends Resource
{
    protected static ?string $model = Applicant::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->maxLength(100)->required()->columnSpanFull(),
                Forms\Components\TextInput::make('email')->maxLength(100)->required()->columnSpanFull(),
                Forms\Components\TextInput::make('address')->maxLength(100)->required()->columnSpanFull(),
                Forms\Components\TextInput::make('phoneNumber')->maxLength(100)->required()->columnSpanFull(),
                Forms\Components\TextInput::make('lastEducation')->maxLength(100)->required()->columnSpanFull(),
                Forms\Components\TextInput::make('ipk')->maxLength(100)->required()->columnSpanFull(),
                Forms\Components\TextInput::make('skill')->maxLength(100)->required()->columnSpanFull(),
                Forms\Components\FileUpload::make('ktp')->maxSize('2048')
                    ->directory('ktp')
                    ->deleteUploadedFileUsing(function ($record) {
                        if ($record && $record->ktp) {
                            Storage::disk('public')->delete($record->ktp);
                        }
                    })
                    ->saveUploadedFileUsing(function ($file) {
                        return $file->store('ktp', 'public');
                    })
                    ->required(),
                Forms\Components\FileUpload::make('cv')->maxSize('2048')
                    ->directory('cv')
                    ->deleteUploadedFileUsing(function ($record) {
                        if ($record && $record->cv) {
                            Storage::disk('public')->delete($record->cv);
                        }
                    })
                    ->saveUploadedFileUsing(function ($file) {
                        return $file->store('cv', 'public');
                    })
                    ->required(),
                Forms\Components\FileUpload::make('image')->image()->maxSize('2048')
                    ->directory('image')
                    ->deleteUploadedFileUsing(function ($record) {
                        if ($record && $record->image) {
                            Storage::disk('public')->delete($record->image);
                        }
                    })
                    ->saveUploadedFileUsing(function ($file) {
                        return $file->store('image', 'public');
                    })
                    ->required(),
                Forms\Components\RichEditor::make('desc')->columnSpanFull()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('address')->searchable(),
                Tables\Columns\TextColumn::make('phoneNumber')->searchable(),
                Tables\Columns\TextColumn::make('lastEducation')->searchable(),
                Tables\Columns\ImageColumn::make('ktp')->width('100px'),
                Tables\Columns\ImageColumn::make('cv')->width('100px'),
                Tables\Columns\ImageColumn::make('image')->width('100px'),
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
                ExportBulkAction::make()
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
            'index' => Pages\ListApplicants::route('/'),
            'create' => Pages\CreateApplicant::route('/create'),
            'edit' => Pages\EditApplicant::route('/{record}/edit'),
        ];
    }
}
