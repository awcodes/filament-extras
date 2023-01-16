<?php

namespace Awcodes\FilamentExtras\Forms\Components;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Illuminate\Database\Eloquent\Model;

class Timestamps
{
    public static function make(): Group
    {
        return Group::make()
            ->schema([
                Placeholder::make('created_at')
                    ->label('Created at')
                    ->content(fn (?Model $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                Placeholder::make('updated_at')
                    ->label('Modified at')
                    ->content(fn (?Model $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
            ])->columnSpanFull()->columns(['default' => 2]);
    }
}
