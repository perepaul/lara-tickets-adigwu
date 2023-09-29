<?php

namespace App\Filament\Widgets;

use App\Enums\TicketStatusEnum;
use App\Models\Ticket;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalTickets = Ticket::count();
        $openTickets = Ticket::where('status', TicketStatusEnum::OPEN->value)->count();
        $closedTickets = Ticket::where('status', TicketStatusEnum::CLOSED->value)->count();

        return [
            Stat::make('Total Tickets', $totalTickets)
                ->color('success'),
            Stat::make('Open Tickets', $openTickets)
                ->color('success'),
            Stat::make('Closed Tickets', $closedTickets)
                ->color('success'),
        ];
    }
}
