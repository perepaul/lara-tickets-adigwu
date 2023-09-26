<?php

namespace App\Enums;

enum TicketPriorityEnum: string
{
    case HIGH = 'high';
    case MEDIUM = 'medium';
    case LOW = 'low';
}
