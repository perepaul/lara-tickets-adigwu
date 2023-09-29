<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TicketPriorityEnum: string implements HasLabel, HasColor, HasIcon
{
    case HIGH = 'high';
    case MEDIUM = 'medium';
    case LOW = 'low';

    public function getLabel(): ?string {
        return match ($this) {
            self::HIGH => 'High',
            self::MEDIUM => 'Medium',
            self::LOW => 'Low',
        };
    }

    public function getColor(): ?string {
        return match ($this) {
            self::HIGH => 'danger',
            self::MEDIUM => 'warning',
            self::LOW => 'gray',
        };
    }

    public function getIcon(): ?string {
        return match ($this) {
            self::HIGH => 'heroicon-m-bell-alert',
            self::MEDIUM => 'heroicon-m-bell-alert',
            self::LOW => 'heroicon-m-bell-alert',
        };
    }
}
