<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoanApplicationResource\Pages;
use App\Models\LoanApplication;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;

class LoanApplicationResource extends Resource
{
    protected static ?string $model = LoanApplication::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->label('Loan Amount')
                    ->required()
                    ->numeric()
                    ->rules(['min:1000']),
                Forms\Components\TextInput::make('tenure')
                    ->label('Loan Tenure')
                    ->required()
                    ->numeric()
                    ->rules(['min:1']),
                Forms\Components\TextInput::make('purpose')
                    ->label('Loan Purpose')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Loan Status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('amount')->label('Amount'),
                Tables\Columns\TextColumn::make('tenure')->label('Tenure (Months)'),
                Tables\Columns\TextColumn::make('purpose')->label('Purpose'),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                        default => ucfirst($state),
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Application Date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->label('Filter by Status'),
                Tables\Filters\Filter::make('amount')
                    ->form([
                        Forms\Components\TextInput::make('amount_from')
                            ->label('Amount From')
                            ->numeric()
                            ->placeholder('Min amount'),
                        Forms\Components\TextInput::make('amount_to')
                            ->label('Amount To')
                            ->numeric()
                            ->placeholder('Max amount'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['amount_from'],
                                fn (Builder $query, $amount): Builder => $query->where('amount', '>=', $amount),
                            )
                            ->when(
                                $data['amount_to'],
                                fn (Builder $query, $amount): Builder => $query->where('amount', '<=', $amount),
                            );
                    }),
            ])
            ->actions([
                // Custom action for "Approve"
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->visible(fn (LoanApplication $record): bool => $record->status === 'pending')
                    ->action(function (LoanApplication $record) {
                        $record->status = 'approved';
                        $record->save();
                        Notification::make()
                            ->title('Loan Approved')
                            ->success()
                            ->send();
                    }),
                // Custom action for "Reject"
                Tables\Actions\Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->visible(fn (LoanApplication $record): bool => $record->status === 'pending')
                    ->action(function (LoanApplication $record) {
                        $record->status = 'rejected';
                        $record->save();
                        Notification::make()
                            ->title('Loan Rejected')
                            ->danger()
                            ->send();
                    }),
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
            'index' => Pages\ListLoanApplications::route('/'),
        ];
    }
}
