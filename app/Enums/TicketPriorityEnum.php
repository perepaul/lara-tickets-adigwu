<?php

namespace App\Enums;

enum TicketStatusEnum: string
{
    case HIGH = 'high';
    case MEDIUM = 'medium';
    case LOW = 'low';
}
