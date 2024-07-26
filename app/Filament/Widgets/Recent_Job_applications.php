<?php

namespace App\Filament\Widgets;

use App\Models\Jobappointment;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class Recent_Job_applications extends BaseWidget
{
    protected static ?string $heading = 'Recent Application ';
    protected static ?int $sort = 2;
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Jobappointment::query()
            )
            ->defaultPaginationPageOption(5)
            ->defaultSort('updated_at', 'desc') // Default sorting by 'created_at' in descending order
            ->columns([
                TextColumn::make('name')
                    ->label('Full Name')
                    ->searchable(),
    
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
    
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),
    
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'pending' => 'info',    // Light blue or information color
                        'accepted' => 'success', // Green color
                        'rejected' => 'danger',  // Red color
                    ]),
    
                TextColumn::make('updated_at')
                    ->label('Requested Date')
                    ->dateTime('d M Y') // Format as Day Month Year (e.g., 12 Jan 2024)
                    ->sortable(), // Allow sorting by created_at
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(), // Edit action
                    Tables\Actions\DeleteAction::make(), // Delete action
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Bulk delete action
                ]),
            ]);
    }
    
}
