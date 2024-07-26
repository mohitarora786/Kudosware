<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedbackResource\Pages;
use App\Filament\Resources\FeedbackResource\RelationManagers;
use App\Models\Feedback;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;
class FeedbackResource extends Resource
{
    protected static ?string $model = Feedback::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right'; // Updated icon
    protected static ?int $navigationSort = 3; // Set the priority for navigation

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Main Section
                Card::make()
                    ->schema([
                        // Section: User Credentials
                        Card::make()
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Name')
                                            ->required()
                                            ->columnSpan(1),
                                        
                                        TextInput::make('email')
                                            ->label('Email')
                                            ->required()
                                            ->email()
                                            ->columnSpan(1),
                                    ])
                            ])
                            ->columns(1)
                            ->heading('User Credentials'),
                        
                        // Section: Feedback Details
                        Card::make()
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('phone')
                                            ->label('Phone')
                                            ->required()
                                            ->columnSpan(1),
                                        
                                        TextInput::make('subject')
                                            ->label('Subject')
                                            ->required()
                                            ->columnSpan(1),
                                    ])
                            ])
                            ->columns(1)
                            ->heading('Feedback Details'),
                        
                        // Section: Your Feedback
                        Card::make()
                            ->schema([
                                MarkdownEditor::make('message')
                                    ->label('Message')
                                    ->required()
                                    ->placeholder('Write your feedback here...')
                                    ->extraAttributes([
                                        'data-markdown-editor' => true, // Custom attribute for Markdown editor
                                    ]),
                            ])
                            ->columns(1)
                            ->heading('Your Feedback'),
                    ])
                    ->columns(1)
                    ->heading('Feedback Form'),
            ]);
    }
    
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Define your columns here
                TextColumn::make('name')
                    ->label('Name')
                  
                    ->searchable(),
                
                TextColumn::make('email')
                    ->label('Email')
                   
                    ->searchable(),
    
                TextColumn::make('phone')
                    ->label('Phone')
                   
                    ->searchable(),
                    TextColumn::make('message')
                    ->label('Feedback')
                   ,
                
                TextColumn::make('created_at')
                    ->label('Commentede At')
                    ->dateTime('d M Y') // Format as Day Month Year (e.g., 12 Jan 2024)
                    ->sortable(),
            ])
            ->filters([
                // Define your filters here
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(), // View action
                    Tables\Actions\EditAction::make(), // Edit action
                    Tables\Actions\DeleteAction::make(), // Delete action
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make() // Display the bulk delete action
                        ->label('Delete Selected') // Optional: Add a label if desired
                        ->icon('heroicon-o-trash') // Optional: Add an icon if desired
                        ->color('danger'), // Optional: Set the color if needed
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
            'index' => Pages\ListFeedback::route('/'),
            'create' => Pages\CreateFeedback::route('/create'),
            'edit' => Pages\EditFeedback::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        // Fetch count of feedback created in the past 7 days
        $recentFeedbackCount = DB::table('feedback')
            ->whereBetween('created_at', [now()->subDays(7)->startOfDay(), now()->endOfDay()])
            ->count();

        return $recentFeedbackCount > 0 ? (string) $recentFeedbackCount : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        // Fetch count of feedback created in the past 7 days
        $recentFeedbackCount = DB::table('feedback')
            ->whereBetween('created_at', [now()->subDays(7)->startOfDay(), now()->endOfDay()])
            ->count();

        if ($recentFeedbackCount > 50) {
            return 'danger'; // Red for danger
        } elseif ($recentFeedbackCount > 40) {
            return 'warning'; // Yellow for warning
        } elseif ($recentFeedbackCount > 10) {
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
                ->label('Feedback') // Adjust this label as needed
                ->icon('heroicon-o-chat') // Adjust this icon as needed
                ->badge(static::getNavigationBadge())
                ->badgeColor(static::getNavigationBadgeColor())
                ->sort(3) // Adjust the sorting as needed
                ->url('/admin/feedback'), // Adjust this URL as needed
        ];
    }
}
