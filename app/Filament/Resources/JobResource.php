<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobResource\Pages;
use App\Filament\Resources\JobResource\RelationManagers;
use App\Models\Job;
use DeepCopy\Filter\Filter;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make('Job Information')
                    ->schema([
                        Card::make('Basic Job Information')
                            ->schema([
                                Grid::make()
                                    ->schema([
                                        TextInput::make('job_title')
                                            ->label('Job Title')
                                            ->required()
                                            ->maxLength(255),
                                        TextInput::make('job_domain')
                                            ->label('Job Domain')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->columns(2),
                            ])
                            // ->label('Basic Job Information')
                            ,
    
                        Card::make('Job Details')
                            ->schema([
                                Grid::make()
                                    ->schema([
                                        TextInput::make('salary')
                                            ->label('Salary')
                                            ->required(),
                                        Select::make('tenure')
                                            ->label('Employment Type')
                                            ->options([
                                                'Full Time' => 'Full Time',
                                                'Part Time' => 'Part Time',
                                                'Internship' => 'Internship',
                                                'Contract' => 'Contract',
                                            ])
                                            ->required(),
                                        TextInput::make('job_location')
                                            ->label('Job Location')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->columns(3),
                            ])
                            // ->label('Job Details'),
                    ])
                    // ->label('Job Information'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('job_title')
                    ->label('Job Title')
                    
                    ->searchable(),
                TextColumn::make('salary')
                    ->label('Salary')
                    ->sortable()
                    ->searchable(),
                    TextColumn::make('tenure')
                    ->label('Employment Type')
                    ->searchable(),
                TextColumn::make('job_domain')
                    ->label('Job Domain')
                   
                    ->searchable(),
                TextColumn::make('job_location')
                    ->label('Job Location')
                    ->searchable(),
            ])
          
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make()
                ])
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
