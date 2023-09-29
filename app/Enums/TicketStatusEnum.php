<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TicketStatusEnum: string implements HasLabel, HasColor, HasIcon
{
    case OPEN = 'open';
    case CLOSED = 'closed';

    public function getLabel(): ?string {
        return match ($this) {
            self::OPEN => 'Open',
            self::CLOSED => 'Closed',
        };
    }

    public function getColor(): ?string {
        return match ($this) {
            self::OPEN => 'success',
            self::CLOSED => 'danger',
        };
    }

    public function getIcon(): ?string {
        return match ($this) {
            self::OPEN => 'heroicon-m-pencil',
            self::CLOSED => 'heroicon-m-x-circle',
        };
    }
}
