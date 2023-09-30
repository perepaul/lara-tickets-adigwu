<?php

namespace App\Models;

use App\Enums\TicketStatusEnum;
use App\Enums\TicketPriorityEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    protected $casts = [
        'status' => TicketStatusEnum::class,
        'priority' => TicketPriorityEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
