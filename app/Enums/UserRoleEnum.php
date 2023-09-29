<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum UserRoleEnum: string implements HasLabel, HasColor, HasIcon
{
    case AGENT = 'agent';
    case COMPLAINANT = 'complainant';

    public function getLabel(): ?string {
        return match ($this) {
            self::AGENT => 'Agent',
            self::COMPLAINANT => 'Complainant',
        };
    }

    public function getColor(): ?string {
        return match ($this) {
            self::AGENT => 'warning',
            self::COMPLAINANT => 'success',
        };
    }

    public function getIcon(): ?string {
        return match ($this) {
            self::AGENT => 'heroicon-m-user',
            self::COMPLAINANT => 'heroicon-m-user',
        };
    }
}
