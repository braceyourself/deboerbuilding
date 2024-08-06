<?php

namespace App\Filament\Resources;

use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\FeedbackResource\Pages;
use App\Filament\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->columns(1)->schema([
            Forms\Components\Textarea::make('content')->required(),
            Forms\Components\Select::make('client_id')->relationship('client', 'name')->required()
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client.name'),
                Tables\Columns\TextColumn::make('content')->limit(10),
                Tables\Columns\TextColumn::make('created_at')->label('Created')->formatStateUsing(fn($state) => $state->diffForHumans()),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            TextEntry::make('client.name'),
            TextEntry::make('content'),
            TextEntry::make('created_at')->label('Created')->formatStateUsing(fn($state) => $state->diffForHumans()),
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
            'index'  => Pages\ListFeedback::route('/'),
//            'create' => Pages\CreateFeedback::route('/create'),
//            'edit'   => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }
}
