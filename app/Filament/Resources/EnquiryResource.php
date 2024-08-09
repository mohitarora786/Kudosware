<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnquiryResource\Pages;
use App\Filament\Resources\EnquiryResource\RelationManagers;
use App\Models\Enquiry;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Navigation\NavigationItem;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EnquiryResource extends Resource
{
    protected static ?string $model = Enquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path-rounded-square'; // Updated icon

    protected static ?int $navigationSort = 4; // Set the priority for navigation

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Main Section: Enquiry
                Section::make('Enquiry')
                    ->schema([
                        // First Sub-section: Name and Email
                        Section::make('Contact Information')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Name')
                                            ->required(),
                                        Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->required()
                                            ->email(),
                                    ]),
                            ]),

                        // Second Sub-section: Phone and Subject
                        Section::make('Additional Information')
                            ->schema([
                                Forms\Components\Grid::make()
                                    ->columns(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Phone')
                                            ->required(),
                                        Forms\Components\TextInput::make('subject')
                                            ->label('Subject')
                                            ->required(),
                                    ]),
                            ]),

                        // Third Sub-section: Message
                        Section::make('Enquiry Details')
                            ->schema([
                                Forms\Components\MarkdownEditor::make('message')
                                    ->label('Message')
                                    ->required()
                                    ->placeholder('Enter your message here...'),
                            ]),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->query(
                Enquiry::query() // Replace with your actual model
            )
            ->columns([
                // Display the name column
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')

                    ->searchable(),

                // Display the email column
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')

                    ->searchable(),

                // Display the phone column
                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')

                    ->searchable(),

                TextColumn::make('service_type')
                    ->label('Service Type'),
                TextColumn::make('technology')
                    ->label('Technology'),
                // Display the message column with limited text for preview
                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->limit(50) // Show only the first 50 characters
                ,

                // Display the created_at column formatted as 'd M Y'
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Enquired Date')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                // Add filters if needed
                // Example: Filtering by date range
                // Tables\Columns\dateti::make('created_at')
                //     ->label('Date Range'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(), // View action
                    Tables\Actions\EditAction::make(), // Edit action
                    Tables\Actions\DeleteAction::make(), // Delete action
                ]),
            ])
            ->bulkActions([
                // Action to delete selected records
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Delete Selected')
                        ->icon('heroicon-o-trash'),
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
            'index' => Pages\ListEnquiries::route('/'),
            'create' => Pages\CreateEnquiry::route('/create'),
            'edit' => Pages\EditEnquiry::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        // Fetch count of messages created in the past 7 days
        $recentMessagesCount = \DB::table('enquiries')
            ->whereBetween('created_at', [now()->subDays(7), now()])
            ->count();

        return $recentMessagesCount > 0 ? (string) $recentMessagesCount : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        // Fetch count of messages created in the past 7 days
        $recentMessagesCount = \DB::table('enquiries')
            ->whereBetween('created_at', [now()->subDays(7), now()])
            ->count();

        if ($recentMessagesCount > 50) {
            return 'danger'; // Red for danger
        } elseif ($recentMessagesCount > 40) {
            return 'warning'; // Yellow for warning
        } elseif ($recentMessagesCount > 10) {
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
}
