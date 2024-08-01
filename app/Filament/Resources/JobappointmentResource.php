<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobappointmentResource\Pages;
use App\Filament\Resources\JobappointmentResource\RelationManagers;
use App\Models\Jobappointment;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobappointmentResource extends Resource
{
    protected static ?string $model = Jobappointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-document'; // Updated icon

    protected static ?int $navigationSort = 2; // Set the priority for navigation
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Job Applicant Details')
                    ->schema([
                        // First Section: Basic Details
                        Section::make('Basic Details')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Name')
                                    ->required(),
                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->required(),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Phone')
                                    ->required(),
                            ])
                            ->columns(3), // Three columns layout
    
                        // Second Section: Job Details
                        Section::make('Job Details')
                        ->schema([
                            Forms\Components\Select::make('job_id')
                                ->label('Job Designation')
                                ->relationship('job', 'job_title')
                                ->reactive()
                                ->required()
                                ->afterStateUpdated(function (callable $set, $state) {
                                    $job = \App\Models\Job::find($state);
                                    $set('job_role', $job ? $job->job_title : null);
                                }),
                            Forms\Components\TextInput::make('job_role')
                                ->label('Job Role')
                                ->required(),
                            Forms\Components\TextInput::make('subject')
                                ->label('Subject')
                                ->required(),
                        ])
                        ->columns(3), // Three columns layout
    
                        // Third Section: Document Upload
                        Section::make('Document Upload')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('File')
                                    ->required(),
                            ])
                            ->columns(1), // Single column layout
                    ])
                    ->columns(1) // Single column layout for the parent section
            ]);
    }
    
    
    


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Full Name')
                    ->searchable(),
                
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                    TextColumn::make('job_role')
                    ->label('Job Role')
                    ->searchable(),
                
                TextColumn::make('phone')
                    ->label('Phone Number')
                    ->searchable(),
                
                SelectColumn::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ])
                    ->default('Pending'),
                
                ImageColumn::make('image')
                    ->label('Cv / Resume')
                    ->disk('public') // Ensure this matches your disk configuration
                    ->width(100) // Thumbnail width
                    ->height(80) // Thumbnail height
                    // ->defaultImage('default-image.png'), // Optional: Default image if file is missing
            ])
            ->filters([
                // Add filters if needed
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
            ])])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        $pendingCount = Jobappointment::where('status', 'pending')->count();
    
        return $pendingCount > 0 ? (string) $pendingCount : null;
    }
    
    public static function getNavigationBadgeColor(): ?string
    {
        $pendingCount = Jobappointment::where('status', 'pending')->count();
    
        if ($pendingCount > 50) {
            return 'danger'; // Red for danger
        } elseif ($pendingCount > 40) {
            return 'success'; // Green for success
        } elseif ($pendingCount > 10) {
            return 'info'; // Blue for info
        } else {
            return null; // No specific color
        }
    }
    
    public static function getNavigation(): array
    {
        return [
            // Other navigation items...
    
            NavigationItem::make()
                ->label(static::getModelLabel())
                ->icon(static::getNavigationIcon())
                ->badge(static::getNavigationBadge())
                ->badgeColor(static::getNavigationBadgeColor())
                ->sort(static::getNavigationSort())
                ->url(static::getUrl('index')),
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobappointments::route('/'),
            'create' => Pages\CreateJobappointment::route('/create'),
            'edit' => Pages\EditJobappointment::route('/{record}/edit'),
        ];
    }
}
